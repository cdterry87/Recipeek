<template>
    <div id="favorites">
        <Loading v-if="loading" />
        <div v-else>
            <v-container fluid grid-list-lg>
                <v-row align="center" justify="center">
                    <div v-if="favorites.length == 0" class="text-center">
                        <div class="mt-5 display-1">Uh oh,</div>
                        <div class="mt-5 title">You have not added any favorites yet.</div>
                        <div class="mt-2 title">Come back when you've added a few!</div>
                        <div class="mt-5">
                            <v-btn text to="/home">Return Home</v-btn> or
                            <v-btn text to="/discover">Discover Recipes</v-btn>
                        </div>
                    </div>
                    <RecipeCard v-else v-for="(favorite, index) in favorites" :key="index" :recipe="favorite.recipe" />
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
        name: 'Favorites',
        components: {
            Loading,
            RecipeCard
        },
        data() {
            return {
                loading: true,
                favorites: []
            }
        },
        methods: {
            getRecipes() {
                axios.get('/api/favorites')
                .then(response => {
                    this.favorites = response.data

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

