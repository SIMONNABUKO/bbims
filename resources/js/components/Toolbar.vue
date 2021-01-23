<template>
    <div>
        <v-toolbar>
            <v-app-bar-nav-icon @click="showSideMenu()"></v-app-bar-nav-icon>

            <v-toolbar-title>BBMS</v-toolbar-title>

            <v-spacer></v-spacer>
            <div>
                <router-link to="/donors"
                    ><v-btn text>
                        Donors
                    </v-btn></router-link
                >

                <router-link to="/patients"
                    ><v-btn text>
                        Patients
                    </v-btn></router-link
                >

                <router-link to="/login"
                    ><v-btn text>
                        Login
                    </v-btn></router-link
                >
                <v-btn icon>
                    <v-icon>mdi-export</v-icon>
                </v-btn>
            </div>
        </v-toolbar>
    </div>
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
            tags: []
        };
    },
    methods: {
        ...mapActions({
            showSideMenu: "showSideMenu",
            closeSideMenu: "closeSideMenu"
        }),

        sendFormData(e) {
            e.preventDefault();
            let title = this.title;
            let description = this.description;
            return this.createCategory({ title, description });
            this.title = "";
            this.description = "";
        }
    },

    watch: {},
    mounted() {
        console.log("Component mounted.");
    }
};
</script>
