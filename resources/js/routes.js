import Home from './views/Home'
import Add from './views/Add'
import Recipe from './views/Recipe'
import Discover from './views/Discover'
import Favorites from './views/Favorites'

import Account from './views/Account'
import NotFound from './views/NotFound'

export default [
    {
        path: '/home',
        name: 'home',
        component: Home,
    },
    {
        path: '/add',
        name: 'add',
        component: Add
    },
    {
        path: '/recipe/:id',
        name: 'recipe',
        component: Recipe,
        props: true
    },
    {
        path: '/discover',
        name: 'discover',
        component: Discover
    },
    {
        path: '/favorites',
        name: 'favorites',
        component: Favorites
    },
    {
        path: '/account',
        name: 'account',
        component: Account
    },
    {
        path: '*',
        component: NotFound
    }
];
