import Home from './views/Home'
import Account from './views/Account'
import NotFound from './views/NotFound'

export default [
    {
        path: '/home',
        name: 'home',
        component: Home,
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
