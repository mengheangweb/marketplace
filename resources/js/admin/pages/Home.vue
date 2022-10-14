<template>
    <master-layout>
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard</h1>

            <p>Welcome back {{ user.name }}</p>
        </div>

        <div class="row mt-5">
            <div class="col-sm-6 col-lg-3 mb-4">
                <div class="card bg-danger text-white">
                    <div class="card-body">
                        <h5 class="card-title">Rejected Post</h5>
                        <h6 class="card-subtitle mb-2">{{ post.rejected }}</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 mb-4">
                <div class="card bg-success text-white">
                    <div class="card-body">
                        <h5 class="card-title">Active Post</h5>
                        <h6 class="card-subtitle mb-2">{{ post.active }}</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 mb-4">
                <div class="card bg-info text-white">
                    <div class="card-body">
                        <h5 class="card-title">Pending Post</h5>
                        <h6 class="card-subtitle mb-2">{{ post.pendding }}</h6>
                    </div>
                </div>
            </div>
        </div>

    </master-layout>
</template>

<script>
    import axios from 'axios';
import MasterLayout from '../layouts/Master.vue'

    export default {
        components: {
            MasterLayout
        },
        mounted(){
            Echo.private('example-name')
                .listen('.App\\Events\\PostCreated', (e) => {
                    this.post.pendding++
                });

            this.getTotalPost();
        },  
        data(){
            return {
                post: {
                    rejected: 0,
                    active: 0,
                    pendding: 0,
                },
                user: this.$store.state.auth_user
            }
        },
        methods: {
            getTotalPost(){
                axios.get('/api/post/total').then(res => {
                    this.post.pendding = res.data.total_post.pendding
                    this.post.active = res.data.total_post.active
                    this.post.rejected = res.data.total_post.rejected
                })
            }
        }
    }
</script>