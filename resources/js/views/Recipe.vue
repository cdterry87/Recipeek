<template>
    <div id="add">
        <v-container fluid grid-list-lg>
            <v-layout row>
                <v-flex xs12 md8 offset-md2>
                    <div class="text-center mb-5">
                        <h1 class="display-1">{{ recipe.title }}</h1>
                        <div v-html="recipe.description" class="mt-3"></div>
                    </div>
                    <v-layout row class="text-center">
                        <v-flex xs4>
                            <v-icon>mdi-alarm</v-icon>
                            <span v-if="recipe.total_hours > 0">{{ recipe.total_hours }} h</span>
                            <span v-if="recipe.total_minutes > 0">{{ recipe.total_minutes }} m</span>
                        </v-flex>
                        <v-flex xs4>
                            <v-icon>mdi-chart-pie</v-icon>
                            {{ recipe.servings }} servings
                        </v-flex>
                        <v-flex xs4>
                            <v-icon>mdi-nutrition</v-icon>
                            {{ recipe.calories }} calories
                        </v-flex>
                    </v-layout>
                    <v-layout row class="mt-3">
                        <v-flex xs12 md6>
                            <h2 class="title"><v-icon>mdi-apple</v-icon> Ingredients</h2>

                        </v-flex>
                        <v-flex xs12 md6>
                            <h2 class="title"><v-icon>mdi-format-list-numbered</v-icon> Instructions</h2>
                        </v-flex>
                    </v-layout>
                </v-flex>
            </v-layout>
        </v-container>
    </div>
</template>

<script>
    import Event from './../events'

    export default {
        name: 'Recipe',
        props: ['id'],
        data() {
            return {
                recipe: ''
            }
        },
        methods: {
            getRecipe() {
                axios.get('/api/recipes/' + this.id)
                .then(response => {
                    this.recipe = response.data
                })
            }
        },
        created() {
            this.getRecipe()
        }
    }
</script>
