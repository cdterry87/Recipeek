import Home from './views/Home'
import Categories from './views/Categories'
import Category from './views/Category'
import Recipes from './views/Recipes'
import Recipe from './views/Recipe'
import NotFound from './views/NotFound'

export default [
    {
        path: '/home',
        name: 'home',
        component: Home,
    },
    {
        path: '/categories',
        name: 'categories',
        component: Categories,
    },
    {
        path: '/categories/:id',
        name: 'category',
        component: Category,
        props: true
    },
    {
        path: '/recipes',
        name: 'recipes',
        component: Recipes,
    },
    {
        path: '/recipes/:id',
        name: 'recipe',
        component: Recipe,
        props: true
    },
    {
        path: '*',
        name: 'notfound',
        component: NotFound
    }
];
