<template>
    <div id="discover">
        <Loading v-if="loading" />
        <div v-else>
            <v-container fluid grid-list-lg>
                <v-layout row wrap>
                    <div v-if="recipes.length == 0">
                        There are no recipes to look at right now.  Please check back later.
                    </div>
                    <RecipeCard v-else v-for="(recipe, index) in recipes" :key="index" :recipe="recipe" />
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
        name: 'Discover',
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
                axios.get('/api/discover')
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

