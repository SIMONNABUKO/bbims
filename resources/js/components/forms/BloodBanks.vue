<template>
    <v-container>
        <v-card>
            <v-card-title class="primary mt-10" style="color:#fff">
                Blood Banks Registration Form
                <v-card-subtitle style="color:#fff">
                    Please Enter All The Details
                </v-card-subtitle>
            </v-card-title>

            <form @submit.prevent="submit">
                <v-container fluid>
                    <v-row>
                        <v-col cols="6">
                            <v-text-field
                                v-model="name"
                                label="Blood Bank Name"
                                required
                            ></v-text-field>
                            <v-text-field
                                v-model="blood_bags"
                                label="Blood Bags"
                                required
                            ></v-text-field>

                            <v-btn
                                depressed
                                color="success"
                                class="mr-4"
                                type="submit"
                            >
                                Register Blood Bank
                            </v-btn>
                        </v-col>
                        <v-col cols="6">
                            <v-text-field
                                v-model="address"
                                label="Blood Bank's Address"
                                required
                            ></v-text-field>
                            <v-text-field
                                v-model="subcounty"
                                label="Blood Bank Sub-County"
                                required
                            ></v-text-field>
                        </v-col>
                    </v-row>
                </v-container>
            </form>
        </v-card>
    </v-container>
</template>

<script>
import { mapActions, mapGetters } from "vuex";
export default {
    data: {
        name: "",
        email: "",
        phone: "",
        blood_type: "",
        address: "",
        dob: "",
        gender: "",
        subcounty: "",
        password: ""
    },

    methods: {
        getData: function() {
            let name = this.name;
            let email = this.email;
            let phone = this.phone;
            let blood_type = this.blood_type;
            let dob = this.dob;
            let gender = this.gender;
            let subcounty = this.subcounty;
            let is_donor = 1;
            let password = this.password;

            const data = {
                name,
                email,
                phone,
                blood_type,
                dob,
                gender,
                subcounty,
                is_donor,
                password
            };

            this.registerUser(data);
        },
        ...mapActions({
            registerUser: "registerUser"
        })
    },
    computed: {
        ...mapGetters({
            createUserMessage: "createUserMessage"
        })
    },
    watch: {
        createUserMessage: function(nv, ol) {}
    },
    mounted() {
        console.log("Component mounted.");
    }
};
</script>
