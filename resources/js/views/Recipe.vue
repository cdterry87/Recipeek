<template>
    <div id="add">
        <v-container fluid grid-list-lg>
            <v-layout row>
                <v-flex xs12 md8 offset-md2>
                    <v-card light>
                        <v-card-text>
                            <div class="text-center mb-5">
                                <h1 class="headline">{{ recipe.title }}</h1>
                                <div class="mt-3">
                                    <span>
                                        <v-icon>mdi-alarm</v-icon>
                                        <span v-if="recipe.total_hours > 0">{{ recipe.total_hours }}h</span>
                                        <span v-if="recipe.total_minutes > 0">{{ recipe.total_minutes }}m</span>
                                    </span>
                                    <span>
                                        <v-icon>mdi-chart-pie</v-icon>
                                        {{ recipe.servings }} <span v-if="$vuetify.breakpoint.mdAndUp">servings</span>
                                    </span>
                                    <span>
                                        <v-icon>mdi-nutrition</v-icon>
                                        {{ recipe.calories }} <span v-if="$vuetify.breakpoint.mdAndUp">calories</span>
                                    </span>
                                </div>
                                <div v-html="recipe.description" class="mt-3"></div>
                            </div>
                            <v-layout row class="mt-3">
                                <v-flex xs12 md5>
                                    <h2 class="title"><v-icon>mdi-apple</v-icon> Ingredients</h2>
                                    <div>
                                        <v-btn text small color="red" class="mt-3">
                                            <v-icon class="mr-2">mdi-plus-circle</v-icon>
                                            Add Ingredient
                                        </v-btn>
                                        <v-list>
                                            <v-list-item-group multiple>
                                                <template v-for="(ingredient, index) in ingredients">
                                                    <v-list-item :key="ingredient.ingredient">
                                                        <template v-slot:default="{ active, toggle }">
                                                            <v-list-item-action>
                                                                <v-checkbox v-model="active" @click="toggle" class="mx-2" color="red"></v-checkbox>
                                                            </v-list-item-action>
                                                            <v-list-item-content>
                                                                <v-list-item-title>{{ ingredient.ingredient }}</v-list-item-title>
                                                            </v-list-item-content>
                                                        </template>
                                                    </v-list-item>
                                                    <v-divider v-if="index + 1 < ingredients.length" :key="index"></v-divider>
                                                </template>
                                            </v-list-item-group>
                                        </v-list>
                                    </div>
                                </v-flex>
                                <v-flex xs12 md7>
                                    <h2 class="title"><v-icon>mdi-format-list-numbered</v-icon> Instructions</h2>
                                    <div>
                                        <v-btn text small color="red" class="mt-3">
                                            <v-icon class="mr-2">mdi-plus-circle</v-icon>
                                            Add Instruction
                                        </v-btn>
                                    </div>
                                </v-flex>
                            </v-layout>
                        </v-card-text>
                    </v-card>
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
                recipe: '',
                ingredients: [
                    {
                        id: 1,
                        ingredient: '1/2 lb chicken breast',
                    },
                    {
                        id: 2,
                        ingredient: '2 cups chicken broth',
                    },
                    {
                        id: 3,
                        ingredient: '1 carrot',
                    },
                    {
                        id: 4,
                        ingredient: '16oz corn',
                    },
                    {
                        id: 5,
                        ingredient: '16oz black beans, rinsed',
                    },
                ],
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
