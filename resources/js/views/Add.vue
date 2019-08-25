<template>
    <div id="add">
        <v-container fluid grid-list-lg>
            <v-layout row>
                <v-flex xs12 sm8 offset-sm2 md6 offset-md3>
                    <div class="text-center mb-5">
                        <h1 class="display-1">Add Recipe</h1>
                        <h2 class="title mt-2">Fill out the form below to add your recipe.</h2>
                    </div>
                    <div class="mt-3 mb-5" v-if="errors.length > 0">
                        <Errors :errors="errors" />
                    </div>
                    <v-text-field color="white" label="Recipe Name" filled prepend-inner-icon="mdi-silverware-fork-knife" id="title" name="title" v-model="title" type="text" required></v-text-field>
                    <v-textarea filled color="white" name="description" prepend-inner-icon="mdi-format-align-justify" id="description" label="Description" v-model="description"></v-textarea>
                    <v-layout row>
                        <v-flex xs6 md3>
                            <v-text-field color="white" label="Prep Hours" filled prepend-inner-icon="mdi-alarm" id="prep_hours" name="prep_hours" v-model="prep_hours" type="text"></v-text-field>
                        </v-flex>
                        <v-flex xs6 md3>
                            <v-text-field color="white" label="Prep Minutes" filled prepend-inner-icon="mdi-alarm" id="prep_minutes" name="prep_minutes" v-model="prep_minutes" type="text"></v-text-field>
                        </v-flex>
                        <v-flex xs6 md3>
                            <v-text-field color="white" label="Total Hours" filled prepend-inner-icon="mdi-alarm" id="total_hours" name="total_hours" v-model="total_hours" type="text"></v-text-field>
                        </v-flex>
                        <v-flex xs6 md3>
                            <v-text-field color="white" label="Total Minutes" filled prepend-inner-icon="mdi-alarm" id="total_minutes" name="total_minutes" v-model="total_minutes" type="text"></v-text-field>
                        </v-flex>
                    </v-layout>
                    <v-layout row>
                        <v-flex xs6 md10>
                            <v-text-field color="white" label="# of Servings" filled prepend-inner-icon="mdi-numeric" id="servings" name="servings" v-model="servings" type="text" required></v-text-field>
                        </v-flex>
                        <v-flex xs6 md2>
                            <v-checkbox color="white" id="private" name="private" label="Private"></v-checkbox>
                        </v-flex>
                    </v-layout>
                    <div class="text-center">
                        <v-btn outlined text type="submit">Save</v-btn>
                    </div>
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
