<template>
    <div id="add">
        <v-container fluid grid-list-lg>
            <v-layout row>
                <v-flex xs12 md10 offset-md1>
                    <Loading v-if="loading" />
                    <v-card light v-else>
                        <v-card-actions>
                            <v-btn icon small v-if="editMode" @click="deleteRecipe"><v-icon>mdi-close</v-icon></v-btn>
                            <v-spacer></v-spacer>
                            <v-btn color="red" outlined @click="editMode = !editMode"><v-icon>mdi-pencil</v-icon> Edit</v-btn>
                        </v-card-actions>
                        <v-card-text>
                            <div class="text-center mb-5">
                                <h1 class="headline">{{ recipe.title }}</h1>
                                <div class="mt-3">
                                    <span>
                                        <v-icon title="Prep Time">mdi-alarm</v-icon>
                                        <span v-if="recipe.prep_hours > 0">{{ recipe.prep_hours }}h</span>
                                        <span v-if="recipe.prep_minutes > 0">{{ recipe.prep_minutes }}m</span>
                                        <span v-if="$vuetify.breakpoint.mdAndUp"> prep time</span>
                                        <v-icon title="Cook Time">mdi-stove</v-icon>
                                        <span v-if="recipe.cook_hours > 0">{{ recipe.cook_hours }}h</span>
                                        <span v-if="recipe.cook_minutes > 0">{{ recipe.cook_minutes }}m</span>
                                        <span v-if="$vuetify.breakpoint.mdAndUp"> cook time</span>
                                    </span>
                                    <span>
                                        <v-icon title="Servings">mdi-chart-pie</v-icon>
                                        {{ recipe.servings }} <span v-if="$vuetify.breakpoint.mdAndUp">servings</span>
                                    </span>
                                    <span>
                                        <v-icon title="Calories">mdi-nutrition</v-icon>
                                        {{ recipe.calories }} <span v-if="$vuetify.breakpoint.mdAndUp">calories</span>
                                    </span>
                                </div>
                                <div v-html="recipe.description" class="mt-3"></div>
                            </div>
                            <div>
                                <h2 class="title"><v-icon>mdi-tag</v-icon> Tags</h2>
                                <div v-if="editMode">
                                    <div v-if="addTagMode">
                                        <v-form method="POST" id="tagForm" class="fadein" @submit.prevent="addTag" ref="tagForm" lazy-validation>
                                            <v-text-field color="grey darken-2" append-icon="mdi-close" @click:append="addTagMode = false" label="Tag" :rules="[v => !!v || 'Tag is required']" id="tag" name="tag" ref="tag" v-model="tag" type="text" required maxlength="30">
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
                                        <v-btn text small color="red" class="mt-3" @click="addTagMode = true">
                                            <v-icon class="mr-2">mdi-plus-circle</v-icon>
                                            Add Tag
                                        </v-btn>
                                    </div>
                                </div>
                                <div v-if="recipe.tags.length == 0" class="mt-2">
                                    This recipe does not currently have any tags.
                                </div>
                                <div v-else class="mt-2">
                                    <v-chip v-for="(tag, index) in recipe.tags" :key="index" class="ma-1" dark color="red" @click:close="deleteTag(tag.id)" :close="editMode">{{ tag.tag }}</v-chip>
                                </div>
                            </div>
                            <v-layout row class="mt-3">
                                <v-flex xs12 md5>
                                    <h2 class="title"><v-icon>mdi-apple</v-icon> Ingredients</h2>
                                    <div v-if="editMode">
                                        <div v-if="addIngredientMode">
                                            <v-form method="POST" id="ingredientForm" class="fadein" @submit.prevent="addIngredient" ref="ingredientForm" lazy-validation>
                                                <v-text-field color="grey darken-2" append-icon="mdi-close" @click:append="addIngredientMode = false" label="Ingredient" :rules="[v => !!v || 'Ingredient is required']" id="ingredient" name="ingredient" ref="ingredient" v-model="ingredient" type="text" required maxlength="250">
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
                                            <v-btn text small color="red" class="mt-3" @click="addIngredientMode = true">
                                                <v-icon class="mr-2">mdi-plus-circle</v-icon>
                                                Add Ingredient
                                            </v-btn>
                                        </div>
                                    </div>
                                    <div v-if="recipe.ingredients.length == 0" class="mt-2">
                                        This recipe does not currently have any ingredients.
                                    </div>
                                    <v-list v-else>
                                        <v-list-item-group multiple>
                                            <template v-for="(ingredient, index) in recipe.ingredients">
                                                <v-list-item :key="ingredient.ingredient">
                                                    <template v-slot:default="{ active, toggle }">
                                                        <v-list-item-action>
                                                            <v-icon v-if="editMode" @click="deleteIngredient(ingredient.id)">mdi-close</v-icon>
                                                            <v-checkbox v-else v-model="active" @click="toggle" class="mx-2" color="red"></v-checkbox>
                                                        </v-list-item-action>
                                                        <v-list-item-content>
                                                            <v-list-item-subtitle>{{ ingredient.ingredient }}</v-list-item-subtitle>
                                                        </v-list-item-content>
                                                    </template>
                                                </v-list-item>
                                                <v-divider v-if="index + 1 < recipe.ingredients.length" :key="index"></v-divider>
                                            </template>
                                        </v-list-item-group>
                                    </v-list>
                                </v-flex>
                                <v-flex xs12 md7>
                                    <h2 class="title"><v-icon>mdi-format-list-numbered</v-icon> Instructions</h2>
                                    <div v-if="editMode">
                                        <div v-if="addInstructionMode">
                                            <v-form method="POST" id="instructionForm" class="fadein" @submit.prevent="addInstruction" ref="instructionForm" lazy-validation>
                                                <v-text-field color="grey darken-2" append-icon="mdi-close" @click:append="addInstructionMode = false" label="Instruction" :rules="[v => !!v || 'Instruction is required']" id="instruction" name="instruction" ref="instruction" v-model="instruction" type="text" required>
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
                                            <v-btn text small color="red" class="mt-3" @click="addInstructionMode = true">
                                                <v-icon class="mr-2">mdi-plus-circle</v-icon>
                                                Add Instruction
                                            </v-btn>
                                        </div>
                                    </div>
                                    <div v-if="recipe.instructions.length == 0" class="mt-2">
                                        This recipe does not currently have any instructions.
                                    </div>
                                    <v-list v-else>
                                        <v-list-item-group multiple>
                                            <template v-for="(instruction, index) in recipe.instructions">
                                                <v-list-item :key="instruction.instruction">
                                                    <template v-slot:default="{ active, toggle }">
                                                        <v-list-item-action>
                                                            <v-icon v-if="editMode" @click="deleteInstruction(instruction.id)">mdi-close</v-icon>
                                                            <v-checkbox v-else v-model="active" @click="toggle" class="mx-2" color="red"></v-checkbox>
                                                        </v-list-item-action>
                                                        <v-list-item-content>
                                                            <v-list-item-subtitle>{{ instruction.instruction }}</v-list-item-subtitle>
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
                editMode: false,
                recipe: '',
                loading: true,
                addIngredientMode: false,
                addInstructionMode: false,
                ingredient: '',
                instruction: '',
                tag: '',
                addTagMode: false
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
            deleteRecipe() {
                axios.delete('/api/recipes/' + this.id)
                .then(response => {
                    this.recipe = response.data
                    this.$router.push('/home')
                })
            },
            addIngredient() {
                if (this.$refs.ingredientForm.validate()) {
                    let ingredient = this.ingredient
                    let recipe_id = this.id

                    axios.post('/api/ingredients', { ingredient, recipe_id })
                    .then(response => {
                        this.getRecipe()

                        Event.$emit('success', response.data.message)

                        this.ingredient = ''
                        this.$refs.ingredient.focus();
                        this.$refs.ingredientForm.resetValidation()
                    })
                }
            },
            addInstruction() {
                if (this.$refs.instructionForm.validate()) {
                    let instruction = this.instruction
                    let recipe_id = this.id

                    axios.post('/api/instructions', { instruction, recipe_id })
                    .then(response => {
                        this.getRecipe()

                        Event.$emit('success', response.data.message)

                        this.instruction = ''
                        this.$refs.instruction.focus();
                        this.$refs.instructionForm.resetValidation()
                    })
                }
            },
            addTag() {
                if (this.$refs.tagForm.validate()) {
                    let tag = this.tag
                    let recipe_id = this.id

                    axios.post('/api/tags', { tag, recipe_id })
                    .then(response => {
                        this.getRecipe()

                        Event.$emit('success', response.data.message)

                        this.tag = ''
                        this.$refs.tag.focus();
                        this.$refs.tagForm.resetValidation()
                    })
                }
            },
            deleteIngredient(id) {
                axios.delete('/api/ingredients/' + id)
                .then(response => {
                    this.getRecipe()

                    Event.$emit('success', response.data.message)
                })
            },
            deleteInstruction(id) {
                axios.delete('/api/instructions/' + id)
                .then(response => {
                    this.getRecipe()

                    Event.$emit('success', response.data.message)
                })
            },
            deleteTag(id) {
                axios.delete('/api/tags/' + id)
                .then(response => {
                    this.getRecipe()

                    Event.$emit('success', response.data.message)
                })
            }
        },
        created() {
            this.getRecipe()
        }
    }
</script>
