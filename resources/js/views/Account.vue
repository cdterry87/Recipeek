<template>
    <v-container fluid grid-list-md>
        <div class="text-center mb-4">
            <v-btn color="" @click="logout">
                <v-icon>mdi-logout</v-icon>
                Sign Out
            </v-btn>
        </div>
        <div class="mt-5 mb-5">
            <v-divider></v-divider>
        </div>
        <v-layout row>
            <v-flex xs12 sm10 offset-sm1 md6 offset-md3>
                <div class="title text-center mb-3">
                    Account Information
                </div>
                <Loading v-if="loadingAccount" />
                <div v-else>
                    <v-form method="POST" id="accountForm" @submit.prevent="updateAccount" ref="form" lazy-validation>
                        <v-text-field color="white" label="Full Name" filled prepend-inner-icon="mdi-account" v-model="user.name" id="name" name="name" type="text" :rules="[v => !!v || 'Name is required']" autocomplete="off" required></v-text-field>
                        <v-text-field color="white" label="Email" filled prepend-inner-icon="mdi-email" v-model="user.email" id="email" name="email" type="email" :rules="[v => !!v || 'Email is required']" autocomplete="off" required></v-text-field>
                        <div class="text-center">
                            <v-btn type="submit" color="">Update</v-btn>
                        </div>
                    </v-form>
                </div>
            </v-flex>
            <v-flex xs12 class="mt-5 mb-5">
                <v-divider></v-divider>
            </v-flex>
            <v-flex xs12 sm10 offset-sm1 md6 offset-md3>
                <div class="title text-center mb-3">
                    Update Password
                </div>
                <v-form method="POST" id="accountForm" @submit.prevent="changePassword" ref="form" lazy-validation>
                    <v-text-field color="white" v-model="password" label="Password" filled prepend-inner-icon="mdi-lock" id="password" name="password" type="password" autocomplete="off" required></v-text-field>
                    <v-text-field color="white" v-model="password_confirmation" label="Confirm Password" filled prepend-inner-icon="mdi-lock" id="password_confirmation" name="password_confirmation" type="password" autocomplete="off" required></v-text-field>
                    <div class="text-center">
                        <v-btn type="submit" color="">Update</v-btn>
                    </div>
                </v-form>
            </v-flex>
        </v-layout>
    </v-container>
</template>

<script>
    import Event from './../events'
    import Loading from '../components/Loading'

    export default {
        name: 'Account',
        components: {
            Loading
        },
        data() {
            return {
                loadingAccount: true,
                user: [],
                password: '',
                password_confirmation: ''
            }
        },
        methods: {
            logout() {
                axios.get('/api/logout')
                .then(function () {
                    location.reload()
                });
            },
            getUser() {
                axios.get('/api/user')
                .then(response => {
                    this.user = response.data
                    this.loadingAccount = false
                })
            },
            updateAccount() {
                if (this.$refs.form.validate()) {
                    this.loadingAccount = true

                    let name = this.user.name
                    let email = this.user.email

                    axios.post('/api/account', { name, email })
                    .then(response => {
                        this.user = response.data.data
                        this.loadingAccount = false

                        Event.$emit('success', response.data.message)
                    })
                    .catch(function (error) {
                        Event.$emit('error', response.data.message)
                    });
                }
            },
            changePassword() {
                let password = this.password
                let password_confirmation = this.password_confirmation

                if (!_.isEmpty(password) && !_.isNull(password) && password === password_confirmation) {
                    axios.post('/api/password', { password })
                    .then(response => {
                        this.password = ''
                        this.password_confirmation = ''

                        Event.$emit('success', response.data.message)
                    })
                    .catch(function (error) {
                        Event.$emit('error', response.data.message)
                    });
                } else {
                    Event.$emit('error', 'Passwords cannot be blank and must match.')
                }
            },
        },
        mounted() {
            this.getUser()
        }
    }
</script>
