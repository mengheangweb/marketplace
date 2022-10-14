import './bootstrap';

import '../../css/admin/app.css'
import VueFeather from 'vue-feather';



import { createApp } from 'vue';
import router from './route/index.js'
import store from './store'

import '../../css/admin/app.scss';

import App from './App.vue';

const app = createApp(App)

app.component(VueFeather.name, VueFeather);

app.use(router)
app.use(store)

app.mount('#app')