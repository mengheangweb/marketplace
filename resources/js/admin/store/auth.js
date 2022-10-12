import axios from 'axios'
import router from '../route'

export default {
    namespaced: true,
    state: {
        authenticated: false,
        user: {}
    },

    getters: {
        getAuth(state) {
            return state.authenticated
        }
    },
    mutations: {
        SET_AUTH(state, value){
            state.authenticated = value
        }
    },
    actions: {
        login({commit}){
            return axios.get('/api/user').then(({data})=>{
                commit('SET_AUTH',true)
                router.push('/')
            }).catch(({response:{data}})=>{
            })
        },
        logout({commit}){
            commit('SET_AUTH', false)
        }
    }
}

