<template>
    <v-footer color="primary" class="pt-5 mt-12" padless>
        <v-row justify="center" no-gutters>
            <!-- <v-btn color="white" text rounded class="my-2">
                Home
            </v-btn> -->
            <v-col class="primary py-4 text-center white--text" cols="12">
                {{ new Date().getFullYear() }} — <strong>BBMS</strong>
            </v-col>
        </v-row>
    </v-footer>
</template>

<script>
export default {
    mounted() {
        console.log("Component mounted.");
    }
};
</script>
