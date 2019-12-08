<template>
    <div class="container">
        <div class="row"></div>
        <table id="datatable" class="table table-striped" >
          <thead>
            <tr>
              <th>Display Name</th>
              <th>Description</th>
              <th>Created at</th>
            </tr>
          </thead>
          <tbody  @click='showModalUpdate'></tbody>
        </table>
        <div>
            <b-modal ref="update-modal" id="updateModal" title="Add Role" :hide-footer="true">
                <template v-slot:modal-header="{ close }">
                    <h5>Update Role</h5>
                </template>
                <template v-slot:default="{ hide }">
                <b-form action="/api/role/list/getRole.id" method="POST" @submit.prevent="updateRole()" name="updateRoleForm" id="updateRoleForm">
                      <b-form-group label-cols="4" label-cols-lg="3" label="Display Name" label-for="input-default">
                        <b-form-input name="display_name_update" v-model="getRole.name" id="input-default"></b-form-input>
                      </b-form-group>
                      <b-form-group label-cols="4" label-cols-lg="3" label="Description" label-for="input-default">
                        <b-form-input name="description_update" v-model="getRole.description" id="input-default"></b-form-input>
                      </b-form-group>
                      <b-button  size="sm" variant="danger" @click="deleteRole()" type="button">Delete</b-button>
                      <b-button class="float-right" size="sm" variant="success" type="submit">Update</b-button>
                      <b-button class="float-right" size="sm" variant="default" @click="$bvModal.hide('updateModal')">Cancel</b-button>
                </b-form>   
                </template>
            </b-modal>
        </div>
    </div>
</template>

<script>
    var idRole = '';
    export default {
        data(){
            return{
                roles: [],
                display_name: ' ',
                description: ' ',
                sample: ' ',
                description_update: ' ',
                created_at: ' ',
                dataTable:null,
                getRole: [],
            }
        },methods:{
            showModalUpdate(event) {
                $('tr').on('click', function() {idRole = $(this).prop('id');console.log(idRole);});
                if (idRole == 1) {
                    alert('Administrator Role cannot be updated/deleted!');
                }else{
                    this.$refs['update-modal'].show();
                    axios.get('api/role/list/'+idRole).then(function(response){this.getRole = response.data;}.bind(this));
                }    
             },updateRole(){
                var formData = new FormData(document.getElementById("updateRoleForm"));
                axios.post('/api/role/list/update/'+idRole, formData).then(function(response){this.getRole = response.data;}.bind(this));  
                this.$refs['update-modal'].hide();
             },deleteRole(){
                $('tr').on('click', function() {idRole = $(this).prop('id');console.log(idRole);});
                axios.post('/api/role/list/delete/'+idRole).then(function(response){this.getRole = response.data;}.bind(this));  
                this.$refs['update-modal'].hide();
                $('tr[id='+idRole+']').remove();
             }
        }, mounted() {
            var $this = this;
            axios.get('api/role/list').then(function (response) {
                $this.roles = response.data;
                var table = $('#datatable').DataTable();
                $.each($this.roles, function(key, value) {
                     var id = value.id;
                     table.row.add([value.name,value.description,value.created_at]).node().id = id.toString();
                     table.draw( false );
                });
            }).catch(function (error) {
                console.log(error);
            });
        }
    }
    $(document).ready(function () {
      $('table').DataTable();
    });
</script>
