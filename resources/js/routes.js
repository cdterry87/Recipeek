import Home from './views/Home'
import Add from './views/Add'
// import Edit from './views/Edit'
import Recipe from './views/Recipe'

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
        path: '/edit/:id',
        name: 'edit',
        // component: Edit
    },
    {
        path: '/recipe/:id',
        name: 'recipe',
        component: Recipe,
        props: true
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
