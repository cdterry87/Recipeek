<template>
    <div>
        <v-app class="inspire">
            <v-toolbar color="transparent" flat v-if="$vuetify.breakpoint.mdAndUp">
                <v-toolbar-title>
                    <a href="/home" class="display-1 logo">Recipeek</a>
                </v-toolbar-title>
                <v-spacer></v-spacer>
                <v-btn outlined to="/home" v-if="this.$router.currentRoute.name != 'home'" class="ml-3">
                    <v-icon>mdi-home</v-icon>
                    <span class="ml-3" v-if="$vuetify.breakpoint.mdAndUp">Home</span>
                </v-btn>
                <v-btn outlined to="/add" v-if="this.$router.currentRoute.name == 'home'" class="ml-3">
                    <v-icon>mdi-plus</v-icon>
                    <span class="ml-3" v-if="$vuetify.breakpoint.mdAndUp">Add</span>
                </v-btn>
                <v-btn outlined to="/discover" v-if="this.$router.currentRoute.name == 'home'" class="ml-3">
                    <v-icon>mdi-eye</v-icon>
                    <span class="ml-3" v-if="$vuetify.breakpoint.mdAndUp">Discover</span>
                </v-btn>
                <v-btn outlined to="/favorites" v-if="this.$router.currentRoute.name == 'home'" class="ml-3">
                    <v-icon>mdi-star</v-icon>
                    <span class="ml-3" v-if="$vuetify.breakpoint.mdAndUp">Favorites</span>
                </v-btn>
                <v-btn outlined to="/account" class="ml-3">
                    <v-icon>mdi-account-circle</v-icon>
                    <span class="ml-3" v-if="$vuetify.breakpoint.mdAndUp">Account</span>
                </v-btn>
            </v-toolbar>
            <div v-else>
                <v-toolbar color="transparent" flat>
                    <a href="/home" class="headline logo">Recipeek</a>
                    <v-spacer></v-spacer>
                    <v-btn outlined to="/home" v-if="this.$router.currentRoute.name != 'home'" class="ml-1"><v-icon>mdi-home</v-icon></v-btn>
                    <v-btn outlined to="/account" class="ml-1"><v-icon>mdi-account-circle</v-icon></v-btn>
                </v-toolbar>
            </div>

            <v-content>
                <router-view></router-view>

                <v-speed-dial v-if="$vuetify.breakpoint.smAndDown && this.$router.currentRoute.name == 'home'" class="mb-3" v-model="fab" :bottom="fab_bottom" :right="fab_right" :direction="fab_direction" :transition="fab_transition">
                    <template v-slot:activator>
                        <v-btn v-model="fab" color="cyan darken-3" dark fab >
                            <v-icon v-if="fab">mdi-close</v-icon>
                            <v-icon v-else>mdi-menu</v-icon>
                        </v-btn>
                    </template>
                    <v-btn fab dark small color="cyan darken-2" to="/discover"><v-icon>mdi-eye</v-icon></v-btn>
                    <v-btn fab dark small color="cyan darken-1" to="/favorites"><v-icon>mdi-star</v-icon></v-btn>
                    <v-btn fab dark small color="cyan" to="/add"><v-icon>mdi-plus</v-icon></v-btn>
                </v-speed-dial>

                <v-snackbar v-model="snackbar.enabled" :color="snackbar.color" :bottom="true" :timeout="snackbar.timeout">
                    {{ snackbar.message }}
                    <v-btn color="white" text @click="snackbar.enabled = false"><v-icon>mdi-close</v-icon></v-btn>
                </v-snackbar>
            </v-content>

            <div class="footer caption text-center mt-5 mb-3">
                Recipeek &copy; 2019
            </div>
        </v-app>
    </div>
</template>

<script>
import Event from './../events'

export default {
    name: 'App',
    data() {
        return {
            fab: false,
            fab_bottom: true,
            fab_right: true,
            fab_direction: 'left',
            fab_transition: 'slide-y-reverse-transition',
            snackbar: {
                enabled: false,
                message: '',
                timeout: 5000,
                color: ''
            },
        }
    },
    created() {
        Event.$on('success', message => {
            this.snackbar.message = message
            this.snackbar.color = 'success'
            this.snackbar.enabled = true
        })
        Event.$on('warning', message => {
            this.snackbar.message = message
            this.snackbar.color = 'warning'
            this.snackbar.enabled = true
        })
        Event.$on('error', message => {
            this.snackbar.message = message
            this.snackbar.color = 'error'
            this.snackbar.enabled = true
        })
    }
}
</script>
