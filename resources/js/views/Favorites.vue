<template>
    <div id="favorites">
        <Loading v-if="loading" />
        <div v-else>
            <v-container fluid grid-list-lg>
                <v-layout row wrap>
                    <div v-if="favorites.length == 0">
                        You have not added any favorites yet.  Come back when you've added a few!
                    </div>
                    <RecipeCard v-else v-for="(favorite, index) in favorites" :key="index" :recipe="favorite.recipe" />
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

