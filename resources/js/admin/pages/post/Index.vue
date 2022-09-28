<template>

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
                    <span class="badge bg-secondary">{{ item.status }}</span>
                </td>
                <td>{{ item.price }}</td>
                <td>
                    <temple v-if="item.image">
                        <img src="/storage/{{ item.image }}" class="img-thumbnail" style="width: 50px;" alt="...">
                    </temple>
                    <temple v-else>
                        <img src="/asset/thumbnail.png" class="img-thumbnail" style="width: 50px;" alt="...">
                    </temple>
                </td>
                <td>{{ item.category }}</td>
                <td>
                    <router-link class="btn btn-success btn-sm" to="/post/status/approve">Approve</router-link>&nbsp;
                    <router-link class="btn btn-danger btn-sm" to="/post/status/reject">Reject</router-link>

                </td>
            </tr>
        </tbody>
    </table>
</template>

<script>
    export default {
        data() {
            return {
                posts : [
                    {
                        title: 'Iphone 14',
                        price: 2000,
                        category: 'Mobile',
                        status: 'waiting_approval'
                    },
                    {
                        title: 'Iphone 13',
                        price: 1000,
                        category: 'Mobile',
                        status: 'waiting_approval'
                    }
                ],
            }
        }
    }
</script>