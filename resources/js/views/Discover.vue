<template>
    <div id="discover">
        <Loading v-if="loading" />
        <div v-else>
            <v-container fluid grid-list-lg>
                <v-row align="center" justify="center">
                    <div v-if="recipes.length == 0" class="text-center">
                        <div class="mt-5 display-1">Sorry :(</div>
                        <div class="mt-5 title">No recipes are available at this time.</div>
                        <div class="mt-2 title">Please check back later.</div>
                        <div class="mt-5">
                            <v-btn outlined to="/home">Return Home</v-btn>
                        </div>
                    </div>
                    <RecipeCard v-else v-for="(recipe, index) in recipes" :key="index" :recipe="recipe" />
                </v-row>
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

