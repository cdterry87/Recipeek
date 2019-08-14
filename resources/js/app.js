// Pull in bootstrap.js
require('./bootstrap');

// Vue import
import Vue from 'vue'

// Vuetify settings
import Vuetify from 'vuetify'
Vue.use(Vuetify)
const vuetifyOpts = {
    theme: {
        dark: true
    },
}

// Router settings
import VueRouter from 'vue-router'
import routes from './routes'

Vue.use(VueRouter)

const router = new VueRouter({
    mode: 'history',
    routes,
})

// Filters
Vue.filter('truncate', function (string, length) {
    if (!string) return ''
    string = string.toString()
    return _.truncate(string, { length })
})

//Primary components
import App from './components/App'
import Login from './components/auth/Login'
import Register from './components/auth/Register'
import Email from './components/auth/passwords/Email'
import Reset from './components/auth/passwords/Reset'

// App declaration
const app = new Vue({
    el: '#app',
    components: {
        App,
        Login,
        Register,
        Email,
        Reset
    },
    vuetify: new Vuetify(vuetifyOpts),
    router,
});
