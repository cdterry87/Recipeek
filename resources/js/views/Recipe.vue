<template>
    <div id="add">
        <v-container fluid grid-list-lg>
            <v-layout row>
                <v-flex xs12 md10 offset-md1>
                    <Loading v-if="loading" />
                    <v-card light v-else>
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
                                        <div v-if="showAddIngredient">
                                            <v-form method="POST" id="ingredientForm" class="fadein" @submit.prevent="addIngredient" ref="ingredientForm" lazy-validation>
                                                <v-text-field hide-details color="grey darken-2" append-icon="mdi-close" @click:append="showAddIngredient = false" label="Ingredient" :rules="[v => !!v || 'Ingredient is required']" id="ingredient" name="ingredient" v-model="ingredient" type="text" required>
                                                    <template v-slot:append-outer>
                                                        <v-menu>
                                                            <template v-slot:activator="{ on }">
                                                                <v-btn type="submit" v-on="on" text color="green">
                                                                    <v-icon>mdi-check-bold</v-icon>
                                                                </v-btn>
                                                            </template>
                                                        </v-menu>
                                                    </template>
                                                </v-text-field>
                                            </v-form>
                                        </div>
                                        <div v-else>
                                            <v-btn text small color="red" class="mt-3" @click="showAddIngredient = true">
                                                <v-icon class="mr-2">mdi-plus-circle</v-icon>
                                                Add Ingredient
                                            </v-btn>
                                        </div>
                                        <v-list>
                                            <v-list-item-group multiple>
                                                <template v-for="(ingredient, index) in recipe.ingredients">
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
                                                    <v-divider v-if="index + 1 < recipe.ingredients.length" :key="index"></v-divider>
                                                </template>
                                            </v-list-item-group>
                                        </v-list>
                                    </div>
                                </v-flex>
                                <v-flex xs12 md7>
                                    <h2 class="title"><v-icon>mdi-format-list-numbered</v-icon> Instructions</h2>
                                    <div v-if="showAddInstruction">
                                        <v-form method="POST" id="instructionForm" class="fadein" @submit.prevent="addInstruction" ref="instructionForm" lazy-validation>
                                            <v-textarea hide-details color="grey darken-2" no-resize append-icon="mdi-close" @click:append="showAddInstruction = false" label="Instruction" :rules="[v => !!v || 'Instruction is required']" id="instruction" name="instruction" v-model="instruction" type="text" required>
                                                <template v-slot:append-outer>
                                                    <v-menu>
                                                        <template v-slot:activator="{ on }">
                                                            <v-btn type="submit" v-on="on" text color="green">
                                                                <v-icon>mdi-check-bold</v-icon>
                                                            </v-btn>
                                                        </template>
                                                    </v-menu>
                                                </template>
                                            </v-textarea>
                                        </v-form>
                                    </div>
                                    <div v-else>
                                        <v-btn text small color="red" class="mt-3" @click="showAddInstruction = true">
                                            <v-icon class="mr-2">mdi-plus-circle</v-icon>
                                            Add Instruction
                                        </v-btn>
                                    </div>
                                    <v-list>
                                        <v-list-item-group multiple>
                                            <template v-for="(instruction, index) in recipe.instructions">
                                                <v-list-item :key="instruction.ininstructionstruction">
                                                    <template v-slot:default="{ active, toggle }">
                                                        <v-list-item-action>
                                                            <v-checkbox v-model="active" @click="toggle" class="mx-2" color="red"></v-checkbox>
                                                        </v-list-item-action>
                                                        <v-list-item-content>
                                                            <v-list-item-title>{{ instruction.instruction }}</v-list-item-title>
                                                        </v-list-item-content>
                                                    </template>
                                                </v-list-item>
                                                <v-divider v-if="index + 1 < recipe.instructions.length" :key="index"></v-divider>
                                            </template>
                                        </v-list-item-group>
                                    </v-list>
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
    import Loading from './../components/Loading'

    export default {
        name: 'Recipe',
        props: ['id'],
        components: {
            Loading
        },
        data() {
            return {
                recipe: '',
                loading: true,
                showAddIngredient: false,
                showAddInstruction: false,
                ingredient: '',
                instruction: ''
            }
        },
        methods: {
            getRecipe() {
                axios.get('/api/recipes/' + this.id)
                .then(response => {
                    this.recipe = response.data

                    this.loading = false
                })
            },
            addIngredient() {
                if (this.$refs.ingredientForm.validate()) {
                    // this.ingredients.push({ingredient: this.ingredient})
                    let ingredient = this.ingredient
                    let recipe_id = this.id

                    axios.post('/api/ingredients', { ingredient, recipe_id })
                    .then(response => {
                        this.getRecipe()

                        Event.$emit('success', response.data.message)

                        this.ingredient = ''
                    })
                }
            },
            addInstruction() {
                if (this.$refs.instructionForm.validate()) {
                    // this.instructions.push({ingredient: this.instruction})
                    let instruction = this.instruction
                    let recipe_id = this.id

                    axios.post('/api/instructions', { instruction, recipe_id })
                    .then(response => {
                        this.getRecipe()

                        Event.$emit('success', response.data.message)

                        this.instruction = ''
                    })
                }
            },
        },
        created() {
            this.getRecipe()
        }
    }
</script>
