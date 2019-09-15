<template>
    <div id="notfound">
        <div class="text-center display-1 mt-5">
            Sorry, Page Not Found :(

            <div class="mt-5">
                <v-btn x-large outlined to="/home">
                    <v-icon>mdi-home</v-icon>
                    Return Home
                </v-btn>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'NotFound'
    }
</script>
