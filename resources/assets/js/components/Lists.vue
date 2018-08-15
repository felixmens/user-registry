<template>
<div>

    <!-- content section -->
    <div class="content">
        <div class="button button-primary shift-right" @click="showformModal = true">Add User</div>
        <table class="table text-center">
                <tr v-for="user in users" v-bind:key="user.id">
                <td>{{user.firstname}} {{user.surname}}</td>
                <td>{{user.email}}</td>
                <td><a rel="nofollow" name="userid" class="text-danger delete" @click="showdeleteModal = true; setVal(user.id, user.firstname, user.surname, user.email, user.position)"> <span> <i class="fa fa-trash bg-danger"></i> </span></a> </td>
                </tr>
                        
        </table>
        <ul class="pagination">
            <li v-bind:class="[{disabled: !pagination.prev_page_url}]" class="page-item" @click= "listUsers(pagination.prev_page_url)">Previous</li>

            <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item" @click= "listUsers(pagination.next_page_url)">Next</li>
        </ul>
        <!-- Saving Form Modal -->
        <transition name="formmodal" v-if="showformModal">
            <div class="modal-mask">
                <div class="modal-wrapper">
                    <div class="modal-container">

                        <div class="modal-body">
                            <h3 slot="header">Add new user</h3>
                                    <form @submit.prevent="addUser">
                                        <div class="form-group">
                                            <label for="Surname">Name</label>
                                            <input type="text" v-model="user.firstname" class="form-control" required>                            
                                        </div>
                              
                                        <div class="form-group">
                                            <label for="Surname">Surname</label>
                                            <input type="text" v-model="user.surname" class="form-control" required>                            
                                        </div>
                                        <div class="form-group">
                                            <label for="Email">Email</label>
                                            <input name="email" type="email" v-model="user.email" class="form-control" required>                         
                                        </div>
                                        <div class="form-group">
                                            <label for="Position">Position</label>
                                            <input type="text" v-model="user.position" class="form-control" required>                            
                                        </div>
                                        
                                        <div class="form-group">
                                            <p v-html="success" class="text-success text-center"></p>
                                            <button type="submit" class="button button-primary shift-right">Save</button>                                    
                                            <div class="button button-default shift-right" @click="showformModal = false; success = ''">Cancel</div>
                                        </div>
                                    </form>
                            </div>
                        </div>
                    </div>
                </div>
        </transition>
        <!--end form modal-->

        <!--delete modal-->
         <transition name="del-modal" v-if="showdeleteModal">
            <div class="modal-mask">
                <div class="modal-wrapper">
                    <div class="modal-container">
                      <p v-html="success" class="text-success text-center"></p>
                        <div class="modal-body">
                            <h3 slot="header">Confirm delete</h3>
                            <h4>Please confirm that you would like to delete this user?</h4>
                                <input hidden type="text" :value="this.e_id">
                                <button class="button button-primary shift-right" @click="deleteUser(user.id)">Yes</button>
                                <button class="button button-default shift-right" @click="showdeleteModal = false;success = ''">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
            </transition>
            <!--end delete modal-->
    </div>
    <!-- end content -->
        
</div>
</template>
<script>
import formmodal from './formmodal.vue';
export default {
     data(){
            return{
                users: [],
                errors: [],
                user: {
                    id: '',
                    firstname: '',
                    surname: '',
                    email: '',
                    position: ''
                }, user_id: '',
                pagination:{},
                edit:false,
                showformModal: false,
                showdeleteModal: false,
                success: '',
            }
    },

    //sort of a constructor function that calls the listUsers method to list all users
        created(){
            this.listUsers();
        },

        // methods goes in here
         methods:{
            listUsers(page_url){
                let vm = this;
                page_url = page_url || 'api/users'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.users = res.data;
                    vm.makePagination(res.meta,res.links);
                })
                .catch(err => console.log(err));
            },

            // pagination method
            makePagination(meta, links){
                let pagination = {
                    current_page: meta.current_page,
                    last_page: meta.last_page,
                    next_page_url:links.next,
                    prev_page_url: links.prev
                }
                this.pagination = pagination;
            },
            
            //fetch user api data and delete referencing the ID
            deleteUser(id){ 
                    fetch(`api/user/${this.e_id}` ,{
                    method:'delete'                  
                    })
                    .then(res => res.json())
                    .then(data => {
                        this.listUsers();
                        this.success = 'user deleted';
                    })
                    .catch(err => console.log(err));
                
            },

            // Add a new User 
            addUser(){
                if(this.edit === false){
                    fetch(`/api/user`,{
                        method: 'post',
                        body: JSON.stringify(this.user),
                        headers:{
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        this.user.firstname = '';
                        this.user.surname = '';
                        this.user.email = '';
                        this.user.position = '';
                        this.listUsers();
                        this.success = 'User Added';
                    })
                    .catch(err => console.log(err))
                }else{
                   
                }
            },

            //set values to be retrieved for the delete action
            setVal(val_id, val_fname, val_sname, val_email, val_position) {
                this.e_id = val_id;
                this.e_fname = val_fname;
                this.e_sname = val_sname;
                this.e_email = val_email;
                this.e_position = val_position;
            }
         }
}
</script>


