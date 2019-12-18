<template>
    <v-app>
        <v-content>
            <v-container fluid fill-height>
                <v-layout align-center justify-center wrap>
                    <v-flex xs12 sm10 md5>
                        <div class="text-center mb-5">
                            <h1 class="display-1 logo">{{ title }}</h1>
                            <h2 class="title mt-2">Sign in and start cooking!</h2>
                        </div>
                        <div class="mt-3 mb-5" v-if="errorMessages.length > 0">
                            <Errors :errors="errorMessages" />
                        </div>
                        <div class="mb-3">
                            <v-alert type="warning" color="amber darken-2">
                                <div class="subheading">To demo this application, use the following credentials:</div>
                                <div class="caption">Username: admin@example.com</div>
                                <div class="caption">Password: password</div>
                            </v-alert>
                        </div>
                        <v-text-field color="white" label="Email" filled prepend-inner-icon="mdi-email" id="email" name="email" type="text" required></v-text-field>
                        <v-text-field color="white" label="Password" filled prepend-inner-icon="mdi-lock" id="password" name="password" type="password" required></v-text-field>
                        <v-checkbox color="white" id="remember" name="remember" label="Remember Me" value="on"></v-checkbox>
                        <div class="text-center">
                            <v-btn outlined type="submit">Login</v-btn>
                            <v-btn text href="/register">Register</v-btn>
                        </div>
                        <div class="text-center mt-3">
                            <v-btn text href="/password/reset">Forgot your password?</v-btn>
                        </div>
                        <v-container>
                            <v-layout align-center class="mt-2">
                                <v-flex xs12>
                                    <v-divider></v-divider>
                                    <div class="mt-4 text-center">
                                        &copy; {{ title }} {{ new Date().getFullYear()}}
                                    </div>
                                </v-flex>
                            </v-layout>
                        </v-container>
                    </v-flex>
                </v-layout>
            </v-container>
        </v-content>
    </v-app>
</template>

<script>
    import Errors from './../Errors'

    export default {
        name: 'Login',
        props: ['title', 'errors'],
        components: {
            Errors
        },
        computed: {
            errorMessages: function() {
                return JSON.parse(this.errors)
            }
        }
    }
</script>
