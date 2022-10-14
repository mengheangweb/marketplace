import axios from "axios";
import { createStore } from "vuex";
import createPersistedState from 'vuex-persistedstate';
import router from "../route";

const store = createStore({
    plugins: [
        createPersistedState()
    ],
    state(){
        return {
            authenticate: false,
            auth_user: {}
        }
    },
    mutations: {
        SET_AUTH(state, value) {
            state.authenticate = value
        },
        SET_AUTH_USER(state, value) {
            state.auth_user = value
        }
    },
    actions: {
        login({commit}){
            axios.get('/api/user').then(res => {
                commit('SET_AUTH_USER', res.data)
                commit('SET_AUTH', true)
                router.push('/home')
            })
        },
        logout({commit}){
            commit('SET_AUTH_USER', {})
            commit('SET_AUTH', false)
        }
    }
})

export default store;