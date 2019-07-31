// Vue import
import Vue from 'vue'

// Vuetify settings
import Vuetify from 'vuetify'
Vue.use(Vuetify)

// Router settings
import VueRouter from 'vue-router'
import routes from './routes'
Vue.use(VueRouter)
const router = new VueRouter({
    mode: 'history',
    scrollBehavior (to, from, savedPosition) {
        return { x: 0, y: 0 }
    },
    routes,
})

//Primary components
import App from './components/App'
import Errors from './components/auth/Errors'
import Login from './components/auth/Login'
import Register from './components/auth/Register'
import Email from './components/auth/passwords/Email'
import Reset from './components/auth/passwords/Reset'

// Filters
Vue.filter('truncate', function (string, length) {
    if (!string) return ''
    string = string.toString()
    return _.truncate(string, { length })
})

// App declaration
const app = new Vue({
    el: '#app',
    components: {
        App,
        Errors,
        Login,
        Register,
        Email,
        Reset
    },
    router,
});
