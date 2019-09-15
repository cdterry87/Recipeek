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
                    <v-stepper v-model="step" vertical>
                        <v-stepper-step step="1" :complete="(step > 1)" color="red darken-3">Recipe</v-stepper-step>
                        <v-stepper-content step="1">
                            <v-text-field color="white" label="Recipe Name" :rules="[v => !!v || 'Recipe Name is required']" filled prepend-inner-icon="mdi-silverware-fork-knife" id="title" name="title" v-model="title" type="text" required></v-text-field>
                            <v-textarea filled color="white" name="description" prepend-inner-icon="mdi-format-align-justify" id="description" label="Description" v-model="description"></v-textarea>
                            <v-layout row>
                                <v-flex xs6 md3>
                                    <v-text-field color="white" label="Prep Hours" filled prepend-inner-icon="mdi-alarm" id="prep_hours" name="prep_hours" v-model="prep_hours" type="text"></v-text-field>
                                </v-flex>
                                <v-flex xs6 md3>
                                    <v-text-field color="white" label="Prep Minutes" filled prepend-inner-icon="mdi-alarm" id="prep_minutes" name="prep_minutes" v-model="prep_minutes" type="text"></v-text-field>
                                </v-flex>
                                <v-flex xs6 md3>
                                    <v-text-field color="white" label="Total Hours" :rules="[v => !!v || 'Total Hours is required']" filled prepend-inner-icon="mdi-alarm" id="total_hours" name="total_hours" v-model="total_hours" type="text"></v-text-field>
                                </v-flex>
                                <v-flex xs6 md3>
                                    <v-text-field color="white" label="Total Minutes" :rules="[v => !!v || 'Total Minutes is required']" filled prepend-inner-icon="mdi-alarm" id="total_minutes" name="total_minutes" v-model="total_minutes" type="text"></v-text-field>
                                </v-flex>
                            </v-layout>
                            <v-layout row>
                                <v-flex xs7 md9>
                                    <v-text-field color="white" label="# of Servings" filled prepend-inner-icon="mdi-numeric" id="servings" name="servings" v-model="servings" type="text" required></v-text-field>
                                </v-flex>
                                <v-flex xs5 md3>
                                    <v-checkbox color="white" id="private" name="private" label="Private"></v-checkbox>
                                </v-flex>
                            </v-layout>

                            <div class="text-center">
                                <v-btn outlined @click="step = 2">
                                    Next
                                    <v-icon right>mdi-arrow-right-circle</v-icon>
                                </v-btn>
                            </div>
                        </v-stepper-content>

                        <v-stepper-step step="2" color="red darken-3" :complete="step > 2">Ingredients</v-stepper-step>
                        <v-stepper-content step="2">
                            <v-layout row>
                                <v-flex xs8>
                                    <v-text-field color="white" label="Ingredient" :rules="[v => !!v || 'Ingredient is required']" filled prepend-inner-icon="mdi-food-apple" id="ingredient" name="ingredient" v-model="ingredient" type="text" required></v-text-field>
                                </v-flex>
                                <v-flex xs4>
                                    <v-btn outlined @click="">
                                        <v-icon>mdi-plus-circle</v-icon>
                                    </v-btn>
                                </v-flex>
                            </v-layout>
                            <div class="text-center">
                                <v-btn outlined @click="step = 1">
                                    <v-icon left>mdi-arrow-left-circle</v-icon>
                                    Back
                                </v-btn>
                                <v-btn outlined @click="step = 3">
                                    Next
                                    <v-icon right>mdi-arrow-right-circle</v-icon>
                                </v-btn>
                            </div>
                        </v-stepper-content>

                        <v-stepper-step step="3" color="red darken-3">Instructions</v-stepper-step>
                        <v-stepper-content step="3">
                            <v-layout row>
                                <v-flex xs8>
                                    <v-textarea filled color="white" name="instruction" prepend-inner-icon="mdi-format-list-numbered" id="instruction" label="instruction" v-model="instruction"></v-textarea>
                                </v-flex>
                                <v-flex xs4>
                                    <v-btn outlined @click="">
                                        <v-icon>mdi-plus-circle</v-icon>
                                    </v-btn>
                                </v-flex>
                            </v-layout>
                            <div class="text-center">
                                <v-btn outlined @click="step = 2">
                                    <v-icon left>mdi-arrow-left-circle</v-icon>
                                    Back
                                </v-btn>
                                <v-btn outlined type="submit">
                                    Finish
                                    <v-icon right>mdi-check-circle</v-icon>
                                </v-btn>
                            </div>
                        </v-stepper-content>
                    </v-stepper>
                </v-flex>
            </v-layout>
        </v-container>
    </div>
</template>

<script>
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
                image: '',
                video: '',
                private: false
            }
        },
        methods: {

        }
    }
</script>
