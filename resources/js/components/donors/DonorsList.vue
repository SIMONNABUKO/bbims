<template>
    <v-container>
        <v-row>
            <v-col>
                <v-card>
                    <v-card-title class="primary" style="color:#fff">
                        Donors List
                    </v-card-title>
                    <v-simple-table>
                        <template v-slot:default>
                            <thead>
                                <tr>
                                    <th class="text-left">
                                        Name
                                    </th>
                                    <th class="text-left">
                                        Phone
                                    </th>
                                    <th class="text-left">
                                        email
                                    </th>
                                    <th class="text-left">
                                        Blood Group
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
                                <tr v-for="donor in donors" :key="donor.id">
                                    <td>{{ donor.name }}</td>
                                    <td>{{ donor.phone }}</td>
                                    <td>{{ donor.email }}</td>
                                    <td>{{ donor.blood_type }}</td>
                                    <td>{{ donor.subcounty }}</td>
                                    <td>{{ donor.address }}</td>
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
            donors: "donors"
        })
    },

    watch: {},
    mounted() {
        console.log("Component mounted.");
    }
};
</script>
