import Vue from "vue";
import Vuex from "vuex";

import functionality from "./modules/functionality";

// Load Vuex
Vue.use(Vuex);

// create store

export default new Vuex.Store({
    modules: {
        functionality
    }
});
