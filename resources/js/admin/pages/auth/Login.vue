<template>
    <guest-layout>
        <main class="form-signin">

            <form @submit.prevent="proceedLogin">
                <img class="mb-4" src="/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
                <h1 class="h3 mb-3 fw-normal">Login</h1>

                <div v-if="error" class="alert alert-danger" role="alert">
                    Incorrect username or password
                </div>


                <div class="form-floating">
                    <input v-model="form.email" name="email" type="email" class="form-control" id="floatingInput"
                        placeholder="name@example.com">
                    <label for="floatingInput">Email address</label>
                </div>
                <div class="form-floating">
                    <input v-model="form.password" name="password" type="password" class="form-control"
                        id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>

                <div class="checkbox mb-3">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
                <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
            </form>
        </main>
    </guest-layout>
</template>
<script>
import axios from 'axios';
import store from '../../store';
import GuestLayout from './GuestLayout.vue'
// import {mapActions} from 'vuex';

export default {
    components: {
        GuestLayout
    },
    data() {
        return {
            error: false,
            form: {
                email: 'rowland42@example.com',
                password: 'password'
            }
        }
    },
    methods: {
        proceedLogin() {

            axios.get('/sanctum/csrf-cookie').then(response => {
                axios.post('/api/login', this.form).then(res => {
                    store.dispatch('login');
                }).catch(err => {
                    if (err.response.status == 401 && err.response.data.message == 'incorrect') {
                        this.error = true;
                    }
                })
            });
        }
    }
}
</script>

<style scoped>
html,
body {
    height: 100%;
}

body {
    display: flex;
    align-items: center;
    padding-top: 40px;
    padding-bottom: 40px;
    background-color: #f5f5f5;
}

.form-signin {
    width: 100%;
    max-width: 330px;
    padding: 15px;
    margin: auto;
}

.form-signin .checkbox {
    font-weight: 400;
}

.form-signin .form-floating:focus-within {
    z-index: 2;
}

.form-signin input[type="email"] {
    margin-bottom: -1px;
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 0;
}

.form-signin input[type="password"] {
    margin-bottom: 10px;
    border-top-left-radius: 0;
    border-top-right-radius: 0;
}

.bd-placeholder-img {
    font-size: 1.125rem;
    text-anchor: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    user-select: none;
}

@media (min-width: 768px) {
    .bd-placeholder-img-lg {
        font-size: 3.5rem;
    }
}
</style>