/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

window.Vue = require("vue");
import store from "./store/index";
import { mapActions, mapGetters } from "vuex";
import vuetify from "../plugins/Vuetify";
import router from "./Router/Router";
Vue.component("AppHome", require("./components/AppHome.vue").default);

const app = new Vue({
    vuetify: vuetify,
    router,
    store,
    el: "#app",
    methods: {
        ...mapActions({
            fetchUsers: "fetchUsers",
            setData: "setData",
            currentUser: "currentUser"
        })
    },
    mounted() {
        this.fetchUsers();
        this.setData();
        this.currentUser();
        console.log("Users fetched successfully");
    }
});
