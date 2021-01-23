<template>
    <v-container>
        <v-row>
            <v-col>
                <v-card>
                    <v-card-title class="primary" style="color:#fff">
                        bloodBanks List
                    </v-card-title>
                    <v-simple-table>
                        <template v-slot:default>
                            <thead>
                                <tr>
                                    <th class="text-left">
                                        Name
                                    </th>

                                    <th class="text-left">
                                        email
                                    </th>

                                    <th class="text-left">
                                        Sub-County
                                    </th>
                                    <th class="text-left">
                                        Address
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr
                                    v-for="bloodBank in bloodBanks"
                                    :key="bloodBank.id"
                                >
                                    <td>{{ bloodBank.name }}</td>

                                    <td>{{ bloodBank.email }}</td>

                                    <td>{{ bloodBank.subcounty }}</td>
                                    <td>{{ bloodBank.address }}</td>
                                </tr>
                            </tbody>
                        </template>
                    </v-simple-table>
                </v-card>
            </v-col>
        </v-row>
    </v-container>
</template>
<script>
import { mapGetters, mapActions } from "vuex";
export default {
    data() {
        return {};
    },
    methods: {
        ...mapActions({
            showSideMenu: "showSideMenu"
        })
    },
    computed: {
        ...mapGetters({
            bloodBanks: "bloodBanks"
        })
    },

    watch: {},
    mounted() {
        console.log("Component mounted.");
    }
};
</script>
