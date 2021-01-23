<template>
    <div>
        <toolbar />
        <v-navigation-drawer
            stateless
            temporary
            floating
            fixed
            left
            v-model="showSideMenu"
        >
            <v-btn
                fab
                dark
                small
                color="primary"
                class="mb-2 mr-0"
                @click="closeSideMenu"
            >
                <v-icon>
                    mdi-close
                </v-icon>
            </v-btn>
            <v-list-item two-line>
                <v-list-item-avatar>
                    <img
                        src="https://randomuser.me/api/portraits/women/81.jpg"
                    />
                </v-list-item-avatar>

                <v-list-item-content>
                    <v-list-item-title>Jane Smith</v-list-item-title>
                    <v-list-item-subtitle>Logged In</v-list-item-subtitle>
                </v-list-item-content>
            </v-list-item>
            <v-list-item @click="closeSideMenu" block>
                <router-link to="/"
                    ><v-btn color="primary" text>
                        Home
                    </v-btn></router-link
                >
            </v-list-item>
            <v-list-item @click="closeSideMenu">
                <router-link to="/banks"
                    ><v-btn color="primary" text>
                        Blood Banks
                    </v-btn></router-link
                >
            </v-list-item>
            <v-list-item @click="closeSideMenu">
                <router-link to="/patients"
                    ><v-btn color="primary" text>
                        Patients
                    </v-btn></router-link
                >
            </v-list-item>

            <v-list-item to="/donors" @click="closeSideMenu">
                <v-btn color="primary" text>
                    Donors
                </v-btn>
            </v-list-item>
            <v-list-item @click="closeSideMenu">
                <router-link to="/donations"
                    ><v-btn color="primary" text>
                        Donations
                    </v-btn></router-link
                >
            </v-list-item>
            <v-list-item @click="closeSideMenu">
                <router-link to="/register/bank"
                    ><v-btn color="primary" text>
                        Register Blood Banks
                    </v-btn></router-link
                >
            </v-list-item>
            <v-list-item @click="closeSideMenu">
                <router-link to="/register/donor"
                    ><v-btn color="primary" text>
                        Register Donors
                    </v-btn></router-link
                >
            </v-list-item>
            <v-list-item @click="closeSideMenu">
                <router-link to="/register/patient"
                    ><v-btn color="primary" text>
                        Register Patients
                    </v-btn></router-link
                >
            </v-list-item>
        </v-navigation-drawer>
        <router-view></router-view>

        <!-- <v-card class="mx-auto my-12" max-width="500" v-if="authUser">
            <v-card-text>
                <v-card-title class="display-1">
                    {{ authUser.name }}
                </v-card-title>
                <p class=" text--primary">
                  Email:  {{ authUser.email }}
                </p>

                <p class="text--primary">
                   Sub-County: {{ authUser.subcounty }}
                </p>
            </v-card-text>
            <v-card-actions>
                <v-btn text color="deep-purple accent-4">
                    Learn More
                </v-btn>
            </v-card-actions>
        </v-card> -->
        <app-footer />
    </div>
</template>

<script>
import { mapActions, mapGetters } from "vuex";
import Toolbar from "./Toolbar.vue";
import AppFooter from "./AppFooter.vue";
export default {
    components: {
        Toolbar,
        AppFooter
    },
    methods: {
        ...mapActions({
            closeSideMenu: "closeSideMenu"
        })
    },
    computed: {
        ...mapGetters({
            showSideMenu: "showSideMenu",
            authUser: "authUser"
        })
    },
    watch: {
        showSideMenu: function(nv, ol) {
            console.log(nv);
        }
    },
    mounted() {
        console.log("Component mounted.");
    }
};
</script>
