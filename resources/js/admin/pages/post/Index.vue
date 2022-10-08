<template>
    <master-layout>
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Post</h1>
        </div>

        <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Price</th>
                <th scope="col">Image</th>
                <th scope="col">Category</th>
                <th scope="col">Option</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="item in posts">
                    <th scope="row">1</th>
                    <td>
                        {{ item.title }}
                        <br/>
                        <span v-if="item.status == 'approve'" class="badge bg-success">Approved</span>
                        <span v-if="item.status == 'reject'" class="badge bg-danger">Rejected</span>
                        <span v-if="item.status == 'waiting_approval'" class="badge bg-secondary">Waiting Approval</span>

                    </td>
                    <td>{{ item.price }}</td>
                    <td>
                        <temple v-if="item.image">
                            <img :src="'/storage/' + item.image " class="img-thumbnail" style="width: 50px;" alt="...">
                        </temple>
                        <temple v-else>
                            <img src="/asset/thumbnail.png" class="img-thumbnail" style="width: 50px;" alt="...">
                        </temple>
                    </td>
                    <td>{{ item.category.name }}</td>
                    <td>
                        <button @click="response('approve', item.id)"  class="btn btn-success btn-sm">Approve</button>
                        <button @click="response('reject', item.id)"  class="btn btn-danger btn-sm">Reject</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </master-layout>
</template>

<script>
import axios from 'axios';
import MasterLayout from '../../layouts/Master.vue'


    export default {
        components: {
            MasterLayout
        },
        data() {
            return {
                posts : [],
            }
        },
        mounted(){
            this.getPost();
        },  
        methods: {
            getPost(){
                axios.get('/api/post').then((res) => {
                    this.posts = res.data.posts.data
                }).catch((err) => {
                    if(err.response.status == 500){
                        alert('Internal server error')
                    }
                    elseif (err.response.status == 400)
                    {

                    }
                })
            },
            response(value, id){
                axios.get('/api/post/response?status=' + value + '&id=' + id).then((res) => {
                  this.getPost();
                }).catch((err) => {
                    if(err.response.status == 500){
                        alert('Internal server error')
                    }
                    elseif (err.response.status == 400)
                    {

                    }
                })
            }
        }
    }
</script>