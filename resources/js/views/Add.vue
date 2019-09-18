<template>
    <div id="add">
        <v-container fluid grid-list-lg>
            <v-layout row>
                <v-flex xs12 sm8 offset-sm2 md6 offset-md3>
                    <div class="text-center mb-5">
                        <h1 class="display-1">Add Recipe</h1>
                        <h2 class="title mt-2">Add your recipe using the form below.</h2>
                    </div>
                    <div class="mt-3 mb-5" v-if="errors.length > 0">
                        <Errors :errors="errors" />
                    </div>
                    <v-form method="POST" id="recipeForm" @submit.prevent="addRecipe" ref="form" lazy-validation>
                        <v-layout row>
                            <v-flex xs12>
                                <v-text-field hide-details color="white" label="Recipe Name" :rules="[v => !!v || 'Recipe Name is required']" filled prepend-inner-icon="mdi-silverware-fork-knife" id="title" name="title" v-model="title" type="text" required></v-text-field>
                            </v-flex>
                        </v-layout>
                        <v-layout row>
                            <v-flex xs12>
                                <v-textarea hide-details filled color="white" name="description" prepend-inner-icon="mdi-format-align-justify" id="description" label="Description" v-model="description"></v-textarea>
                            </v-flex>
                        </v-layout>
                        <v-layout row>
                            <v-flex xs6 md3>
                                <v-text-field hide-details color="white" label="Prep Hours" filled prepend-inner-icon="mdi-alarm" id="prep_hours" name="prep_hours" v-model="prep_hours" type="text" maxlength="2"></v-text-field>
                            </v-flex>
                            <v-flex xs6 md3>
                                <v-text-field hide-details color="white" label="Prep Minutes" filled prepend-inner-icon="mdi-alarm" id="prep_minutes" name="prep_minutes" v-model="prep_minutes" type="text" maxlength="2"></v-text-field>
                            </v-flex>
                            <v-flex xs6 md3>
                                <v-text-field hide-details color="white" label="Total Hours" filled prepend-inner-icon="mdi-alarm" id="total_hours" name="total_hours" v-model="total_hours" type="text" maxlength="2"></v-text-field>
                            </v-flex>
                            <v-flex xs6 md3>
                                <v-text-field hide-details color="white" label="Total Minutes" filled prepend-inner-icon="mdi-alarm" id="total_minutes" name="total_minutes" v-model="total_minutes" type="text" maxlength="2"></v-text-field>
                            </v-flex>
                        </v-layout>
                        <v-layout row>
                            <v-flex xs6 md4>
                                <v-text-field hide-details color="white" label="Servings" filled prepend-inner-icon="mdi-numeric" id="servings" name="servings" v-model="servings" type="text" maxlength="2"></v-text-field>
                            </v-flex>
                            <v-flex xs6 md4>
                                <v-text-field hide-details color="white" label="Calories" filled prepend-inner-icon="mdi-nutrition" id="calories" name="calories" v-model="calories" type="text" maxlength="6"></v-text-field>
                            </v-flex>
                            <v-flex xs12 md4>
                                <v-checkbox hide-details color="white" id="private" name="private" label="Private"></v-checkbox>
                            </v-flex>
                        </v-layout>
                        <v-layout>
                            <v-flex xs12 class="text-center mt-5">
                                <v-icon class="mr-2">mdi-information</v-icon>
                                In the next step, you will add your ingredients!
                            </v-flex>
                        </v-layout>
                        <v-layout row class="text-center mt-5">
                            <v-flex xs12>
                                <v-btn outlined type="submit">Add Recipe</v-btn>
                            </v-flex>
                        </v-layout>
                    </v-form>
                </v-flex>
            </v-layout>
        </v-container>
    </div>
</template>

<script>
    import Event from './../events'
    import Errors from './../components/Errors'

    export default {
        name: 'Add',
        data() {
            return {
                errors: '',
                step: 0,
                title: '',
                description: '',
                prep_hours: 0,
                prep_minutes: 0,
                total_hours: 0,
                total_minutes: 0,
                servings: 0,
                calories: 0,
                image: '',
                video: '',
                private: false,
            }
        },
        methods: {
            addRecipe() {
                if (this.$refs.form.validate()) {
                    let title = this.title
                    let description = this.description
                    let prep_hours = this.prep_hours
                    let prep_minutes = this.prep_minutes
                    let total_hours = this.total_hours
                    let total_minutes = this.total_minutes
                    let servings = this.servings
                    let calories = this.calories
                    let image = this.image
                    let video = this.video
                    let private_recipe = this.private

                    axios.post('/api/recipes', { title, description, prep_hours, prep_minutes, total_hours, total_minutes, servings, calories, image, video, private_recipe })
                    .then(response => {
                        let recipe_id = response.data.data.id

                        this.$router.push('/ingredients/' + recipe_id)

                        Event.$emit('success', response.data.message)

                        this.reset()
                    })
                }
            },
            reset() {
                this.title = ''
                this.description = ''
                this.prep_hours = ''
                this.prep_minutes = ''
                this.total_hours = ''
                this.total_minutes = ''
                this.servings = ''
                this.calories = ''
                this.image = ''
                this.video = ''
                this.private = ''
            }
        }
    }
</script>
