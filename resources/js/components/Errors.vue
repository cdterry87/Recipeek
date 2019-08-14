<template>
    <div>
        <v-alert :value="show" type="error">
            <ul>
                <li v-for="(error, index) in errors" :key="index">{{ error }}</li>
            </ul>
        </v-alert>
    </div>
</template>

<script>
    export default {
        name: 'Errors',
        props: ['errors'],
        computed: {
            show: function() {
                if (this.errors.length > 0) {
                    return true
                }
                return false
            },
        },
    }
</script>
