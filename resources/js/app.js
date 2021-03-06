/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap')
require('admin-lte')
window.Vue = require('vue')
import swal from 'sweetalert2'
window.swal = swal
const toast = swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
})
window.toast = toast
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));
import { Form, HasError, AlertError } from 'vform'
window.Form = Form
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)
Vue.component(
    'dashboard-component',
    require('./components/DashboardComponent.vue').default
)
Vue.component('dev-component', require('./components/DevComponent.vue').default)
Vue.component(
    'user-component',
    require('./components/UserComponent.vue').default
)
Vue.component(
    'users-component',
    require('./components/UsersComponent.vue').default
)

Vue.component(
    'movies-component',
    require('./components/MoviesComponent.vue').default
)
Vue.component(
    'browse-component',
    require('./components/BrowseComponent.vue').default
)
Vue.component('pagination', require('laravel-vue-pagination'))
Vue.component(
    'passport-clients',
    require('./components/passport/Clients.vue').default
)

Vue.component(
    'passport-authorized-clients',
    require('./components/passport/AuthorizedClients.vue').default
)

Vue.component(
    'passport-personal-access-tokens',
    require('./components/passport/PersonalAccessTokens.vue').default
)
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app'
})
