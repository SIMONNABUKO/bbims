<template>
    <v-container>
        <v-row>
            <v-col>
                <v-card>
                    <v-card-title class="primary" style="color:#fff">
                        Patients List
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
                                <tr
                                    v-for="patient in patients"
                                    :key="patient.id"
                                >
                                    <td>{{ patient.name }}</td>
                                    <td>{{ patient.phone }}</td>
                                    <td>{{ patient.email }}</td>
                                    <td>{{ patient.blood_type }}</td>
                                    <td>{{ patient.subcounty }}</td>
                                    <td>{{ patient.address }}</td>
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
            patients: "patients"
        })
    },

    watch: {},
    mounted() {
        console.log("Component mounted.");
    }
};
</script>
