<template>
    <div id="home">
        <v-container fluid grid-list-lg>
            <v-layout row wrap>
                <v-flex xs12 md4>
                    <v-card light class="mx-auto recipe-card">
                        <v-card-actions>
                            <v-btn outlined small dark color="red">Start Cooking!</v-btn>
                            <v-spacer></v-spacer>
                            <v-btn small icon text><v-icon>mdi-share</v-icon></v-btn>
                            <v-btn small icon text><v-icon>mdi-heart</v-icon></v-btn>
                        </v-card-actions>
                        <v-card-text>
                            <v-list-item three-line>
                                <v-list-item-content>
                                    <v-list-item-title class="headline">My Favorite Recipe</v-list-item-title>
                                    <v-list-item-subtitle>Some lorem ipsum text lorem ipsum text lorem ipsum text lorem ipsum text lorem ipsum text lorem ipsum text.  Some lorem ipsum text some lorem ipsum text lorem ipsum text.</v-list-item-subtitle>
                                </v-list-item-content>
                                <v-list-item-avatar tile size="80" color="grey"></v-list-item-avatar>
                            </v-list-item>
                            <v-chip color="red" dark small close @click:close="" class="ma-1">Instant pot</v-chip>
                            <v-chip color="red" dark small close @click:close="" class="ma-1">Chicken</v-chip>
                            <v-chip color="red" dark small close @click:close="" class="ma-1">Veggies</v-chip>
                            <v-chip color="red" dark small close @click:close="" class="ma-1">Quick and Easy</v-chip>
                            <v-chip color="red" dark small close @click:close="" class="ma-1">&lt; 30 minutes</v-chip>
                        </v-card-text>
                    </v-card>
                </v-flex>
            </v-layout>
        </v-container>
    </div>
</template>

<script>
    export default {
        name: 'Home',
        methods: {
            getRecipes() {

            }
        },
        created() {
            this.getRecipes()
        }
    }
</script>
