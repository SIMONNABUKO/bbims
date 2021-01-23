<template>
    <v-container>
        <v-row>
            <v-col>
                <v-simple-table>
                    <template v-slot:default>
                        <thead>
                            <tr>
                                <th class="text-left">
                                    Name
                                </th>
                                <th class="text-left">
                                    Calories
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="item in desserts" :key="item.name">
                                <td>{{ item.name }}</td>
                                <td>{{ item.calories }}</td>
                            </tr>
                        </tbody>
                    </template>
                </v-simple-table>
            </v-col>
        </v-row>
    </v-container>
</template>
<script>
import { mapGetters, mapActions } from "vuex";
export default {
    data() {
        return {
            title: "",
            description: "",
            shortDescription: "",
            categoryId: "",
            categories: [],
            tags: [],
            desserts: [
                { name: "Desert data", calories: 123 },
                { name: "Desert data", calories: 123 },
                { name: "Desert data", calories: 123 },
                { name: "Desert data", calories: 123 },
                { name: "Desert data", calories: 123 },
                { name: "Desert data", calories: 123 },
                { name: "Desert data", calories: 123 },
                { name: "Desert data", calories: 123 },
                { name: "Desert data", calories: 123 },
                { name: "Desert data", calories: 123 },
                { name: "Desert data", calories: 123 },
                { name: "Desert data", calories: 123 }
            ]
        };
    },
    methods: {
        ...mapActions({
            showSideMenu: "showSideMenu"
        })
    },

    watch: {},
    mounted() {
        console.log("Component mounted.");
    }
};
</script>
