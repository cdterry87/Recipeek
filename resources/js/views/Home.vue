<template>
    <v-container fluid grid-list-lg>
        <v-layout row wrap>
            <v-flex xs12 md9>
                <v-text-field
                    v-model="search"
                    append-icon="search"
                    label="Search"
                    single-line
                    hide-details
                    box
                ></v-text-field>
                <v-data-table
                    :headers="headers"
                    :items="recipes"
                    :search="search"
                    :pagination.sync="pagination"
                    hide-actions
                    class="elevation-1"
                    no-data-text="You have not added any recipes."
                    disable-initial-sort
                >
                    <template v-slot:items="props">
                        <td>
                            <v-avatar size="42px">
                                <img :src="props.item.image" :alt="props.item.name">
                            </v-avatar>
                        </td>
                        <td>{{ props.item.name }}</td>
                        <td>{{ props.item.total_hours }}h {{ props.item.total_minutes}}m</td>
                        <td width="20%">
                            <v-form method="POST" id="deleteForm" @submit.prevent="delete(props.item.id)">
                                <v-btn icon small :to="'/recipe/' + props.item.id" color="amber darken-1" class="amber--text text--lighten-4">
                                    <v-icon>remove_red_eye</v-icon>
                                </v-btn>
                                <v-btn icon small type="submit" color="red darken-1" class="red--text text--lighten-4">
                                    <v-icon>delete</v-icon>
                                </v-btn>
                            </v-form>
                        </td>
                    </template>
                </v-data-table>
            </v-flex>
            <v-flex xs12 md3>
                <v-layout row wrap>
                    <v-flex>
                        <v-card>
                            <v-img
                            class="white--text"
                            height="200px"
                            src="http://pureimg.com/public/uploads/large/241499277735btsxi35kaslejnsyy0qfiauj2ri6dbdjduwxdau0cvqx3psmfherzxcsdwzqgstkauxiemdcxnog6s7aqzc8cejcszamb1mfobfg.jpg"
                            >
                            </v-img>
                            <v-card-text>
                                <span class="title">Recipe of the Day</span><br>
                                <span class="subtitle">Chicken Something</span><br>
                            </v-card-text>
                        </v-card>
                    </v-flex>
                    <v-flex>
                        <v-card>
                            <br>
                            <h3 class="title text-xs-center">Popular Recipes</h3>
                            <v-list two-line>
                                <template v-for="(pop, index) in popular">
                                    <v-list-tile :key="index" avatar :to="'/recipe/' + pop.id">
                                        <v-list-tile-avatar>
                                            <img :src="pop.image">
                                        </v-list-tile-avatar>
                                        <v-list-tile-content>
                                            <v-list-tile-title v-html="pop.name"></v-list-tile-title>
                                            <v-list-tile-sub-title>Est. {{ pop.total_hours }}h {{ pop.total_minutes }}m</v-list-tile-sub-title>
                                        </v-list-tile-content>
                                    </v-list-tile>
                                </template>
                            </v-list>
                        </v-card>
                    </v-flex>
                </v-layout>
            </v-flex>
        </v-layout>
    </v-container>
</template>

<script>
    export default {
        name: 'Home',
        data() {
            return {
                search: '',
                pagination: {
                    sortBy: 'name',
                    rowsPerPage: -1
                },
                headers: [
                    { text: 'Image', value: 'image', sortable: false },
                    { text: 'Name', value: 'name' },
                    { text: 'Time', value: 'time' },
                    { text: 'Actions', value: 'actions', sortable: false },
                ],
                recipes: [
                    { id: 1, name: 'Chicken This', image: 'http://pureimg.com/public/uploads/large/241499277735btsxi35kaslejnsyy0qfiauj2ri6dbdjduwxdau0cvqx3psmfherzxcsdwzqgstkauxiemdcxnog6s7aqzc8cejcszamb1mfobfg.jpg', total_hours: 0, total_minutes: 30 },
                    { id: 2, name: 'Beef That', image: 'http://pureimg.com/public/uploads/large/241499277735btsxi35kaslejnsyy0qfiauj2ri6dbdjduwxdau0cvqx3psmfherzxcsdwzqgstkauxiemdcxnog6s7aqzc8cejcszamb1mfobfg.jpg', total_hours: 0, total_minutes: 25 },
                    { id: 3, name: 'Pork Something', image: 'http://pureimg.com/public/uploads/large/241499277735btsxi35kaslejnsyy0qfiauj2ri6dbdjduwxdau0cvqx3psmfherzxcsdwzqgstkauxiemdcxnog6s7aqzc8cejcszamb1mfobfg.jpg', total_hours: 0, total_minutes: 40 },
                    { id: 4, name: 'Lamb Other', image: 'http://pureimg.com/public/uploads/large/241499277735btsxi35kaslejnsyy0qfiauj2ri6dbdjduwxdau0cvqx3psmfherzxcsdwzqgstkauxiemdcxnog6s7aqzc8cejcszamb1mfobfg.jpg', total_hours: 2, total_minutes: 30 },
                    { id: 5, name: 'Seafood Whatever', image: 'http://pureimg.com/public/uploads/large/241499277735btsxi35kaslejnsyy0qfiauj2ri6dbdjduwxdau0cvqx3psmfherzxcsdwzqgstkauxiemdcxnog6s7aqzc8cejcszamb1mfobfg.jpg', total_hours: 1, total_minutes: 15 },
                    { id: 6, name: 'Burgers and Fries', image: 'http://pureimg.com/public/uploads/large/241499277735btsxi35kaslejnsyy0qfiauj2ri6dbdjduwxdau0cvqx3psmfherzxcsdwzqgstkauxiemdcxnog6s7aqzc8cejcszamb1mfobfg.jpg', total_hours: 0, total_minutes: 30 },
                    { id: 7, name: 'Pizza Italiano', image: 'http://pureimg.com/public/uploads/large/241499277735btsxi35kaslejnsyy0qfiauj2ri6dbdjduwxdau0cvqx3psmfherzxcsdwzqgstkauxiemdcxnog6s7aqzc8cejcszamb1mfobfg.jpg', total_hours: 0, total_minutes: 25 },
                    { id: 8, name: 'Fresh Sushi', image: 'http://pureimg.com/public/uploads/large/241499277735btsxi35kaslejnsyy0qfiauj2ri6dbdjduwxdau0cvqx3psmfherzxcsdwzqgstkauxiemdcxnog6s7aqzc8cejcszamb1mfobfg.jpg', total_hours: 0, total_minutes: 40 },
                    { id: 9, name: 'Ribeye Steak', image: 'http://pureimg.com/public/uploads/large/241499277735btsxi35kaslejnsyy0qfiauj2ri6dbdjduwxdau0cvqx3psmfherzxcsdwzqgstkauxiemdcxnog6s7aqzc8cejcszamb1mfobfg.jpg', total_hours: 2, total_minutes: 30 },
                    { id: 10, name: 'Lasagna', image: 'http://pureimg.com/public/uploads/large/241499277735btsxi35kaslejnsyy0qfiauj2ri6dbdjduwxdau0cvqx3psmfherzxcsdwzqgstkauxiemdcxnog6s7aqzc8cejcszamb1mfobfg.jpg', total_hours: 1, total_minutes: 15 },
                    { id: 11, name: 'Chocolate Cake', image: 'http://pureimg.com/public/uploads/large/241499277735btsxi35kaslejnsyy0qfiauj2ri6dbdjduwxdau0cvqx3psmfherzxcsdwzqgstkauxiemdcxnog6s7aqzc8cejcszamb1mfobfg.jpg', total_hours: 1, total_minutes: 15 },
                    { id: 12, name: 'Creme Brulee', image: 'http://pureimg.com/public/uploads/large/241499277735btsxi35kaslejnsyy0qfiauj2ri6dbdjduwxdau0cvqx3psmfherzxcsdwzqgstkauxiemdcxnog6s7aqzc8cejcszamb1mfobfg.jpg', total_hours: 1, total_minutes: 15 },
                    { id: 13, name: 'Apple Pie', image: 'http://pureimg.com/public/uploads/large/241499277735btsxi35kaslejnsyy0qfiauj2ri6dbdjduwxdau0cvqx3psmfherzxcsdwzqgstkauxiemdcxnog6s7aqzc8cejcszamb1mfobfg.jpg', total_hours: 1, total_minutes: 15 },
                    { id: 14, name: 'Shrimp and Grits', image: 'http://pureimg.com/public/uploads/large/241499277735btsxi35kaslejnsyy0qfiauj2ri6dbdjduwxdau0cvqx3psmfherzxcsdwzqgstkauxiemdcxnog6s7aqzc8cejcszamb1mfobfg.jpg', total_hours: 1, total_minutes: 15 },
                    { id: 15, name: 'Chicken and Waffles', image: 'http://pureimg.com/public/uploads/large/241499277735btsxi35kaslejnsyy0qfiauj2ri6dbdjduwxdau0cvqx3psmfherzxcsdwzqgstkauxiemdcxnog6s7aqzc8cejcszamb1mfobfg.jpg', total_hours: 1, total_minutes: 15 },
                ],
                popular: [
                    { id: 1, name: 'Chicken This', image: 'http://pureimg.com/public/uploads/large/241499277735btsxi35kaslejnsyy0qfiauj2ri6dbdjduwxdau0cvqx3psmfherzxcsdwzqgstkauxiemdcxnog6s7aqzc8cejcszamb1mfobfg.jpg', total_hours: 0, total_minutes: 30 },
                    { id: 2, name: 'Beef That', image: 'http://pureimg.com/public/uploads/large/241499277735btsxi35kaslejnsyy0qfiauj2ri6dbdjduwxdau0cvqx3psmfherzxcsdwzqgstkauxiemdcxnog6s7aqzc8cejcszamb1mfobfg.jpg', total_hours: 0, total_minutes: 25 },
                    { id: 3, name: 'Pork Something', image: 'http://pureimg.com/public/uploads/large/241499277735btsxi35kaslejnsyy0qfiauj2ri6dbdjduwxdau0cvqx3psmfherzxcsdwzqgstkauxiemdcxnog6s7aqzc8cejcszamb1mfobfg.jpg', total_hours: 0, total_minutes: 40 },
                    { id: 4, name: 'Lamb Other', image: 'http://pureimg.com/public/uploads/large/241499277735btsxi35kaslejnsyy0qfiauj2ri6dbdjduwxdau0cvqx3psmfherzxcsdwzqgstkauxiemdcxnog6s7aqzc8cejcszamb1mfobfg.jpg', total_hours: 2, total_minutes: 30 },
                    { id: 5, name: 'Seafood Whatever and Something Else', image: 'http://pureimg.com/public/uploads/large/241499277735btsxi35kaslejnsyy0qfiauj2ri6dbdjduwxdau0cvqx3psmfherzxcsdwzqgstkauxiemdcxnog6s7aqzc8cejcszamb1mfobfg.jpg', total_hours: 1, total_minutes: 15 },
                ],
            }
        },
    }
</script>
