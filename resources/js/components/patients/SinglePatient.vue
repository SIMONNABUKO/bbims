<template>
    <div>
        <v-main>
            <v-container>
                One Patient
            </v-container>
        </v-main>
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
            showSideMenu: "showSideMenu"
        })
    },

    watch: {},
    mounted() {
        console.log("Component mounted.");
    }
};
</script>
