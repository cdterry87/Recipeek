<template>
    <v-flex xs12 md4 >
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
                        <v-list-item-title :class="($vuetify.breakpoint.smAndDown ? 'subtitle-1' : 'headline')" v-html="recipe.title"></v-list-item-title>
                        <v-list-item-subtitle v-html="recipe.description"></v-list-item-subtitle>
                    </v-list-item-content>
                    <v-list-item-avatar tile size="80" color="grey"></v-list-item-avatar>
                </v-list-item>
                <v-chip v-for="(tag, index) in recipe.tags" :key="index" color="red" dark small class="ma-1">{{ tag.tag }}</v-chip>
            </v-card-text>
        </v-card>
    </v-flex>
</template>

<script>
    import Event from './../events'

    export default {
        name: 'RecipeCard',
        props: ['recipe'],
        methods: {
            addFavorite(id) {
                axios.post('/api/favorite', { id })
                .then(response => {
                    Event.$emit('reloadRecipes', response.data)
                })
            },
            removeFavorite(id) {
                axios.post('/api/unfavorite', { id })
                .then(response => {
                    Event.$emit('reloadRecipes', response.data)
                })
            }
        }
    }
</script>
