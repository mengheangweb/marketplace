import { createRouter, createWebHashHistory } from "vue-router";
import store from '../store'

import HomePage from '../pages/Home.vue';
import LoginPage from '../pages/auth/Login.vue';
import PostIndex from '../pages/post/Index.vue';

const routes = [
    {
        path: '/',
        component: HomePage,
        meta: {
            middleware: 'auth'
        }
    },
    {
        path: '/home',
        component: HomePage,
        meta: {
            middleware: 'auth'
        }
    },
    {
        path: '/login',
        component: LoginPage,
        meta: {
            middleware: 'guest'
        }
    },
    {
        path: '/post',
        component: PostIndex,
        meta: {
            middleware: 'auth'
        }
    }
]


const router = createRouter({
    history: createWebHashHistory(),
    routes,
})

router.beforeEach((to, from, next) => {
    if (to.meta.middleware == 'guest') {

        if(store.state.authenticate === true ){
            next('/home')
        }

        next()
    }else{
      
        if(store.state.authenticate === true){
            next();
        }else{
            next('/login')
        }
    }
})

export default router;