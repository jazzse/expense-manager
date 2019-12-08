<template>
    <div class="container" >
        <b-button @click="modalAddUser()" variant="primary" class="float-right">Add User</b-button>
        <b-modal ref="add-modal" id="addModal" title="Add User" :hide-footer="true">
            <template v-slot:modal-header="{ close }">
                <h5>Add User</h5>
            </template>
            <template v-slot:default="{ hide }">
                <b-form action="/api/user" method="POST" id="addUserForm" @submit.prevent="addUser()">
                    <b-form-group label-cols="4" label-cols-lg="3" label="Name" label-for="input-default">
                        <b-form-input name="name" v-model="name" id="input-default"></b-form-input>
                    </b-form-group>
                    <b-form-group label-cols="4" label-cols-lg="3" label="Email Address" label-for="input-default">
                        <b-form-input type="email" name="email" v-model="email" id="input-default"></b-form-input>
                    </b-form-group>
                    <b-form-group label-cols="4" label-cols-lg="3" label="Role" label-for="input-default">
                        <b-form-select v-model="selected"  name="role">
                            <option v-for="getRoleOption in getRoleOptions" :value="getRoleOption.name">{{ getRoleOption.name }}</option>
                        </b-form-select>
                    </b-form-group>
                    <b-button class="float-right" size="sm" variant="success" type="submit">Save</b-button>
                    <b-button class="float-right" size="sm" variant="default" @click="$bvModal.hide('addModal')">Cancel</b-button>
                </b-form>   
            </template>
        </b-modal>           
    </div>
</template>

<script>
    export default {
        data(){
            return{
                users: {},
                name: ' ',
                email: ' ',
                role:'',
                created_at: ' ',
                selected: null,
                options: {},
                getRoleOptions:{},

            }
        }, methods:{
            modalAddUser() {
                axios.get('api/user/userRoles').then(function(response){this.getRoleOptions = response.data;}.bind(this));
                this.$refs['add-modal'].show(); 
             },addUser(){
                var formData = new FormData(document.getElementById("addUserForm"));
                axios.post('./api/user', formData).then(function(response){this.users = response.data;}.bind(this));
                var table = $('#datatable').DataTable();
                table.row.add([this.name,this.email,this.selected,this.created_at]).draw(false)
                this.$refs['add-modal'].hide();
            },onClickApp(event) {
                alert('sample');
            }
        }
    }    
</script>
