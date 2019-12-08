<template>
    <div class="container" >
        <b-button v-b-modal.addModal variant="primary" class="float-right">Add Role</b-button>
        <b-modal ref="add-modal" id="addModal" title="Add Role" :hide-footer="true">
            <template v-slot:modal-header="{ close }">
                <h5>Add Role</h5>
            </template>
            <template v-slot:default="{ hide }">
                <b-form action="/api/role" method="POST" @submit.prevent="addRole()">
                    <b-form-group label-cols="4" label-cols-lg="3" label="Display Name" label-for="input-default">
                        <b-form-input name="display_name" v-model="display_name" id="input-default"></b-form-input>
                    </b-form-group>
                    <b-form-group label-cols="4" label-cols-lg="3" label="Description" label-for="input-default">
                        <b-form-input name="description" v-model="description" id="input-default"></b-form-input>
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
                roles: [],
                display_name: ' ',
                description: ' ',
                created_at: ' ',
            }
        }, methods:{
            addRole(){
                axios.post('./api/role', {name:this.display_name, description:this.description}).then(function(response){this.roles = response.data;}.bind(this));
                var table = $('#datatable').DataTable();
                table.row.add([this.display_name,this.description,this.created_at]).draw(false)
                this.$refs['add-modal'].hide()
            },onClickApp(event) {
                alert('sample');
            }
        }
    }    
</script>
