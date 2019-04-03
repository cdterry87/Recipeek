import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)

import "bulma/css/bulma.min.css";
import "@fortawesome/fontawesome-free/css/all.min.css";

// import Home from './components/Home'
// import Recipe from './components/Recipe'

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            // component: Home,
        },
        {
            path: '/recipe/:id',
            name: 'recipe',
            // component: Recipe,
            props: true
        },
    ],
});

Vue.filter('truncate', function (string, length) {
    if (!string) return ''
    string = string.toString()
    return _.truncate(string, { length })
})

const app = new Vue({
    el: '#app',
    components: { App },
    router,
});
