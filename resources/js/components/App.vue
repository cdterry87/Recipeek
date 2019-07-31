<template>
    <div>
        <v-app class="inspire">
            <v-toolbar color="red darken-1" dark dense>
                <v-toolbar-title>
                    <router-link to="/home" class="search-link white--text" >
                        <span>Recipeek</span>
                    </router-link>
                </v-toolbar-title>

                <v-spacer></v-spacer>

                <v-toolbar-items>
                    <v-menu :nudge-width="100" offset-y>
                        <template v-slot:activator="{ on }">
                            <v-btn flat v-on="on">
                                <v-icon>account_circle</v-icon>
                                <v-icon dark>arrow_drop_down</v-icon>
                            </v-btn>
                        </template>
                        <v-list>
                            <v-list-tile>
                                <router-link to="/account">
                                    <v-list-tile-title>My Account</v-list-tile-title>
                                </router-link>
                            </v-list-tile>
                            <v-list-tile @click="logout">
                                <v-list-tile-title>Logout</v-list-tile-title>
                            </v-list-tile>
                        </v-list>
                    </v-menu>
                </v-toolbar-items>
            </v-toolbar>

            <v-content>
                <router-view></router-view>

                <div id="footer" class="text-xs-center">
                    &copy; Recipeek 2019
                </div>

                <v-snackbar v-model="snackbar.enabled" :color="snackbar.color" :bottom="true" :timeout="snackbar.timeout" multi-line>
                    {{ snackbar.message }}
                    <v-btn color="white" flat @click="snackbar.enabled = false"><v-icon>close</v-icon></v-btn>
                </v-snackbar>
            </v-content>
        </v-app>
    </div>
</template>

<script>
    import Event from './../events'

    export default {
        name: 'App',
        data() {
            return {
                snackbar: {
                    enabled: false,
                    message: 'This is a sample message.',
                    timeout: 5000,
                    y: 'bottom',
                    x: 'right',
                    color: 'dark-grey'
                },

            }
        },
        created() {
            Event.$on('successMessage', message => {
                this.snackbar.message = message
                this.snackbar.color = 'success'
                this.snackbar.enabled = true
            })
            Event.$on('errorMessage', message => {
                this.snackbar.message = message
                this.snackbar.color = 'error'
                this.snackbar.enabled = true
            })
        },
        methods: {
            logout() {
                axios.get('/api/logout')
                .then(function () {
                    location.reload()
                });
            }
        },
    }
</script>
