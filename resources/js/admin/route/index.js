import { createRouter, createWebHashHistory } from "vue-router";

import HomePage from '../pages/Home.vue';
import LoginPage from '../pages/auth/Login.vue';
import PostIndex from '../pages/post/Index.vue';
import store from "../store";

const routes = [
    {
        path: '/',
        name: "home",
        component: HomePage,
        meta: {
            middleware: "auth"
        },
    },
    {
        path: '/login',
        name: 'login',
        component: LoginPage,
        meta: {
            middleware: "guest",
        }
    },
    {
        path: '/post',
        component: PostIndex,
        meta: {
            middleware: "auth"
        },
    }
   
]

const router = createRouter({
    history: createWebHashHistory(),
    routes,
})

router.beforeEach((to,from, next) => {
    if(to.meta.middleware == 'guest'){
        if(store.state.auth.authenticated){
            next({name: "home"});
        }
        next();
    } else{
        if(store.state.auth.authenticated){

            next();
        }else{

            next({name: "login"})
        }

    }
}) 

export default router;