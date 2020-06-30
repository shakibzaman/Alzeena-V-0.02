
require('./bootstrap');

window.Vue = require('vue');

import Vuetify from 'vuetify'
Vue.use(Vuetify);

// import Vuetify from 'vuetify'
import VueRouter from 'vue-router'


// Vue.use(Vuetify)
Vue.use(VueRouter)

// import 'vuetify/dist/vuetify.min.css'

import {routes} from './routes';
import Auth from './auth'
//import user class
// import User from './Helpers/User';
// window.User = User

//import user class
import Notification from './Helpers/Notification';
window.Notification = Notification

//sweet alert start
import Swal from 'sweetalert2'
window.Swal = Swal;

const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
});

window.Toast = Toast;
//sweet alert end
Vue.prototype.$auth = new Auth(window.user);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('admin', require('./components/Admin.vue').default);
Vue.component('public', require('./components/public/Public.vue').default);


window.Reload = new Vue();
const router = new VueRouter({
  mode: 'history',
  routes
})


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router,
     // vuetify: new Vuetify(),
});
