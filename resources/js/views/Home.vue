<template>
    <v-container fluid grid-list-md>
        <v-layout row>
            <v-container text-xs-center>
                <v-btn color="red darken-1" to="/categories" large dark>
                    Categories
                </v-btn>
                <v-btn color="red darken-1" to="/recipes" large dark>
                    Recipes
                </v-btn>
            </v-container>
        </v-layout>
    </v-container>
</template>

<script>
    export default {
        name: 'Home'
    }
</script>
