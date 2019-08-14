<template>
    <v-app id="inspire" dark>
        <v-container fluid fill-height>
            <v-layout align-center justify-center wrap>
                <v-flex xs12 sm10 md5>
                    <div class="text-center mb-3">
                        <h1 class="display-1">{{ title }}</h1>
                        <h2 class="title mt-2">Fill out your email address to send a password reset link.</h2>
                    </div>
                    <div class="mt-3 mb-5" v-if="errorMessages.length > 0">
                        <Errors :errors="errorMessages" />
                    </div>
                    <v-text-field color="white" label="Email" filled prepend-inner-icon="mdi-email" id="email" name="email" type="text" required></v-text-field>
                    <div class="text-center">
                        <v-btn outlined text type="submit">Send Password Reset</v-btn>
                        <v-btn text href="/login">Login</v-btn>
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
    </v-app>
</template>

<script>
    import Errors from './../../Errors'

    export default {
        name: 'Email',
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
