import Home from './views/Home'
import Recipes from './views/Recipes'
import Recipe from './views/Recipe'
import AddRecipe from './views/AddRecipe'
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
        component: AddRecipe
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
