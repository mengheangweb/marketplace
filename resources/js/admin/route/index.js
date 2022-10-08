import { createRouter, createWebHashHistory } from "vue-router";

import HomePage from '../pages/Home.vue';
import LoginPage from '../pages/auth/Login.vue';
import PostIndex from '../pages/post/Index.vue';

const routes = [
    {
        path: '/',
        component: HomePage
    },
    {
        path: '/login',
        component: LoginPage
    },
    {
        path: '/post',
        component: PostIndex
    }
]

const router = createRouter({
    history: createWebHashHistory(),
    routes,
})

export default router;