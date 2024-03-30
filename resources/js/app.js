/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';
import '../css/app.css';
import { createApp } from 'vue';
import { createStore } from 'vuex';

/**
 * Next, we will create a fresh Vue application instance. You may then begin
 * registering components with the application instance so they are ready
 * to use in your application's views. An example is included for you.
 */

const app = createApp({});
const store = createStore({
    state: {
        item: {}
    }
});

app.use(store)

import Login from './components/Login.vue';
app.component('login-component', Login);
import Register from './components/Register.vue';
app.component('register-component', Register);
import Home from './components/Home.vue';
app.component('home-component', Home);
import Modal from './components/Modal.vue';
app.component('modal-component', Modal);
import Input from './components/Input.vue';
app.component('input-component', Input);
import Table from './components/Table.vue';
app.component('table-component', Table);
import Paginate from './components/Paginate.vue';
app.component('paginate-component', Paginate);

app.config.globalProperties.$filters = {
    formatDateTime(d) {
        if (!d) return "";

        d = d.split("T")
        let date = d[0]
        date = date.split("-")
        date = date[2] + "/" + date[1] + "/" + date[0];

        let time = d[1]
        time = time.split('.')
        time = time[0]

        return date
    }
},

    /**
     * The following block of code may be used to automatically register your
     * Vue components. It will recursively scan this directory for the Vue
     * components and automatically register them with their "basename".
     *
     * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
     */

    // Object.entries(import.meta.glob('./**/*.vue', { eager: true })).forEach(([path, definition]) => {
    //     app.component(path.split('/').pop().replace(/\.\w+$/, ''), definition.default);
    // });

    /**
     * Finally, we will attach the application instance to a HTML element with
     * an "id" attribute of "app". This element is included with the "auth"
     * scaffolding. Otherwise, you will need to add an element yourself.
     */

    app.mount('#app');
