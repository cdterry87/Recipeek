<template>
    <div id="home">
        <Loading v-if="loading" />
        <div v-else>
            <v-container v-if="recipes.length == 0" class="fill-height" fluid>
                <v-row align="center" justify="center">
                    <v-col cols="12" class="text-center ma-5 headline">
                        You have not saved any recipes yet.
                        <div class="mt-5">
                            <v-btn text to="/add">Add A Recipe</v-btn> or
                            <v-btn text to="/discover">Discover New Recipes</v-btn>
                        </div>
                    </v-col>
                </v-row>
            </v-container>
            <v-container v-else fluid grid-list-lg>
                <v-layout row wrap>
                    <RecipeCard v-for="(recipe, index) in recipes" :key="index" :recipe="recipe" />
                </v-layout>
            </v-container>
        </div>
    </div>
</template>

<script>
    import Event from './../events'
    import Loading from './../components/Loading'
    import RecipeCard from './../components/RecipeCard'

    export default {
        name: 'Home',
        components: {
            Loading,
            RecipeCard
        },
        data() {
            return {
                loading: true,
                recipes: []
            }
        },
        methods: {
            getRecipes() {
                axios.get('/api/recipes')
                .then(response => {
                    this.recipes = response.data

                    this.loading = false
                })
            },
        },
        created() {
            this.getRecipes()

            Event.$on('reloadRecipes', data => {
                this.getRecipes()
            })
        }
    }
</script>
