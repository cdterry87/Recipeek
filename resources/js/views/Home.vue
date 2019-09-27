<template>
    <div id="home">
        <v-container v-if="recipes.length == 0" class="fill-height" fluid>
            <v-row align="center" justify="center">
                <v-col cols="12" class="text-center ma-5 headline">
                    You have not saved any recipes yet.
                    <div class="mt-5">
                        <v-btn text to="/add">Add A Recipe</v-btn> or
                        <v-btn text to="/discover">Discover New Recipes</v-btn>!
                    </div>
                </v-col>
            </v-row>
        </v-container>
        <v-container v-else fluid grid-list-lg>
            <v-layout row wrap>
                <v-flex xs12 md4 v-for="(recipe, index) in recipes" :key="index">
                    <v-card light class="mx-auto recipe-card">
                        <v-card-actions>
                            <v-btn outlined small dark color="red" :to="'/recipe/' + recipe.id">Start Cooking!</v-btn>
                            <v-spacer></v-spacer>
                            <v-btn small icon text><v-icon>mdi-share</v-icon></v-btn>
                            <v-btn v-if="recipe.favorites.length == 0" small icon text @click="addFavorite(recipe.id)"><v-icon>mdi-heart</v-icon></v-btn>
                            <v-btn v-else small icon text color="red" @click="removeFavorite(recipe.id)"><v-icon>mdi-heart</v-icon></v-btn>
                        </v-card-actions>
                        <v-card-text>
                            <v-list-item three-line>
                                <v-list-item-content>
                                    <v-list-item-title class="headline" v-html="recipe.title"></v-list-item-title>
                                    <v-list-item-subtitle v-html="recipe.description"></v-list-item-subtitle>
                                </v-list-item-content>
                                <v-list-item-avatar tile size="80" color="grey"></v-list-item-avatar>
                            </v-list-item>
                            <v-chip v-for="(tag, index) in recipe.tags" :key="index" color="red" dark small class="ma-1">{{ tag.tag }}</v-chip>
                        </v-card-text>
                    </v-card>
                </v-flex>
            </v-layout>
        </v-container>
    </div>
</template>

<script>
    import Loading from './../components/Loading'
    import Events from './../events'

    export default {
        name: 'Home',
        components: {
            Loading
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
            addFavorite(id) {
                axios.post('/api/favorite', { id })
                .then(response => {
                    this.getRecipes()
                })
            },
            removeFavorite(id) {
                axios.post('/api/unfavorite', { id })
                .then(response => {
                    this.getRecipes()
                })
            }
        },
        created() {
            this.getRecipes()
        }
    }
</script>
