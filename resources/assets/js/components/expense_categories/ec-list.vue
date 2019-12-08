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
            <b-modal ref="update-modal" id="updateModal" title="Update Category" :hide-footer="true">
                <template v-slot:modal-header="{ close }">
                    <h5>Update Category</h5>
                </template>
                <template v-slot:default="{ hide }">
                <b-form action="/api/category/list/getCategory.id" method="POST" @submit.prevent="updateCategory()" name="updateCategoryForm" id="updateCategoryForm">
                      <b-form-group label-cols="4" label-cols-lg="3" label="Display Name" label-for="input-default">
                        <b-form-input name="display_name_update" v-model="getCategory.name" id="input-default"></b-form-input>
                      </b-form-group>
                      <b-form-group label-cols="4" label-cols-lg="3" label="Description" label-for="input-default">
                        <b-form-input name="description_update" v-model="getCategory.description" id="input-default"></b-form-input>
                      </b-form-group>
                      <b-button  size="sm" variant="danger" @click="deleteCategory()" type="button">Delete</b-button>
                      <b-button class="float-right" size="sm" variant="success" type="submit">Update</b-button>
                      <b-button class="float-right" size="sm" variant="default" @click="$bvModal.hide('updateModal')">Cancel</b-button>
                </b-form>   
                </template>
            </b-modal>
        </div>
    </div>
</template>

<script>
    var categoryID = '';
    export default {
        data(){
            return{
                categories: [],
                display_name: ' ',
                description: ' ',
                sample: ' ',
                description_update: ' ',
                created_at: ' ',
                dataTable:null,
                getCategory: [],
            }
        },methods:{
            showModalUpdate(event) {
                $('tr').on('click', function() {categoryID = $(this).prop('id');console.log(categoryID);});
                    this.$refs['update-modal'].show();
                    axios.get('api/category/list/'+categoryID).then(function(response){this.getCategory = response.data;}.bind(this));
             },updateCategory(){
                var formData = new FormData(document.getElementById("updateCategoryForm"));
                axios.post('/api/category/list/update/'+categoryID, formData).then(function(response){this.getCategory = response.data;}.bind(this));  
                this.$refs['update-modal'].hide();
             },deleteCategory(){
                $('tr').on('click', function() {categoryID = $(this).prop('id');console.log(categoryID);});
                axios.post('/api/category/list/delete/'+categoryID).then(function(response){this.getCategory = response.data;}.bind(this));  
                this.$refs['update-modal'].hide();
                $('tr[id='+categoryID+']').remove();
             }
        }, mounted() {
            var $this = this;
            axios.get('api/category/list').then(function (response) {
                $this.categories = response.data;
                var table = $('#datatable').DataTable();
                $.each($this.categories, function(key, value) {
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
