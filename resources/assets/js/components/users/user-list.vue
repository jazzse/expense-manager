<template>
    <div class="container">
        <div class="row"></div>
        <table id="datatable" class="table table-striped" >
          <thead>
            <tr>
              <th>Name</th>
              <th>Email</th>
              <th>Role</th>
              <th>Created at</th>
            </tr>
          </thead>
          <tbody  @click='showModalUpdate()'></tbody>
        </table>
        <div>
            <b-modal ref="update-modal" id="updateModal" title="Update Users" :hide-footer="true">
                <template v-slot:modal-header="{ close }">
                    <h5>Update Role</h5>
                </template>
                <template v-slot:default="{ hide }">
                <b-form action="/api/user/list/getUser.id" method="POST" @submit.prevent="updateUser()" name="updateUserForm" id="updateUserForm">
                      <b-form-group label-cols="4" label-cols-lg="3" label="Name" label-for="input-default">
                        <b-form-input name="name_update" v-model="getUser.name" id="input-default"></b-form-input>
                      </b-form-group>
                      <b-form-group label-cols="4" label-cols-lg="3" label="Email Address" label-for="input-default">
                        <b-form-input name="email_update" v-model="getUser.email" id="input-default"></b-form-input>
                      </b-form-group>
                      <b-form-group label-cols="4" label-cols-lg="3" label="Role" label-for="input-default">
                        <b-form-select v-model="selected"  name="role_update">
                            <option v-for="getRoleOption in getRoleOptions" :value="getRoleOption.name">{{ getRoleOption.name }}</option>
                        </b-form-select>
                    </b-form-group>
                      <b-button  size="sm" variant="danger" @click="deleteUser()" type="button">Delete</b-button>
                      <b-button class="float-right" size="sm" variant="success" type="submit">Update</b-button>
                      <b-button class="float-right" size="sm" variant="default" @click="$bvModal.hide('updateModal')">Cancel</b-button>
                </b-form>   
                </template>
            </b-modal>
        </div>
    </div>
</template>

<script>
    var userId = '';
    export default {
        data(){
            return{
                users: [],
                name: ' ',
                email: ' ',
                role: ' ',
                created_at: ' ',
                dataTable:null,
                getRole: [],
                getUser: [],
                selected: null,
                options: {},
                getRoleOptions:{},
            }
        },methods:{
            showModalUpdate(event) {
                $('tr').on('click', function() {userId = $(this).prop('id');console.log(userId);});
               
                    this.$refs['update-modal'].show();
                    axios.get('api/user/list/'+userId).then(function(response){this.getUser = response.data;}.bind(this));
                    axios.get('api/user/userRoles').then(function(response){this.getRoleOptions = response.data;}.bind(this));
                   
             },updateUser(){
                var formData = new FormData(document.getElementById("updateUserForm"));
                axios.post('/api/user/list/update/'+userId, formData).then(function(response){this.getUser = response.data;}.bind(this));  
                this.$refs['update-modal'].hide();
             },deleteUser(){
                $('tr').on('click', function() {idRole = $(this).prop('id');console.log(userId);});
                axios.post('/api/user/list/delete/'+userId).then(function(response){this.userId = response.data;}.bind(this));  
                this.$refs['update-modal'].hide();
                $('tr[id='+userId+']').remove();
             }
        }, mounted() {
            var $this = this;
            axios.get('api/user/list').then(function (response) {
                $this.users = response.data;
                var table = $('#datatable').DataTable();
                $.each($this.users, function(key, value) {
                     var id = value.id;
                     table.row.add([value.name,value.email,value.role,value.created_at]).node().id = id.toString();
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
