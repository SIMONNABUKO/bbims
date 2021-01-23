<template>
    <v-container>
        <v-card>
            <v-card-title class="primary mt-10" style="color:#fff">
                Patients Registration Form
                <v-card-subtitle style="color:#fff">
                    Please Enter All The Details
                </v-card-subtitle>
            </v-card-title>

            <form @submit.prevent="getData">
                <div v-if="createUserMessage">
                    <v-alert type="success">{{ createUserMessage }}</v-alert>
                </div>
                <v-container fluid>
                    <v-row>
                        <v-col cols="6">
                            <v-text-field
                                v-model="name"
                                label="Patient Name"
                                required
                            ></v-text-field>
                            <v-text-field
                                v-model="email"
                                label="Patient Email"
                                required
                            ></v-text-field>
                            <v-text-field
                                v-model="phone"
                                label="Patient Phone"
                                required
                            ></v-text-field>
                            <v-text-field
                                v-model="blood_type"
                                label="Patient Blood Type"
                                required
                            ></v-text-field>

                            <v-text-field
                                v-model="password"
                                label="Patient's Password"
                                type="password"
                                required
                            ></v-text-field>
                            <v-btn
                                depressed
                                color="success"
                                class="mr-4"
                                type="submit"
                            >
                                Register Patient
                            </v-btn>
                        </v-col>
                        <v-col cols="6">
                            <v-text-field
                                v-model="address"
                                label="Patient's Address"
                                required
                            ></v-text-field>
                            <v-text-field
                                v-model="dob"
                                label="Patient's Date of Birth"
                                required
                            ></v-text-field>
                            <v-text-field
                                v-model="gender"
                                label="Patient's Gender"
                                required
                            ></v-text-field>
                            <v-text-field
                                v-model="subcounty"
                                label="Patient's Sub-Country"
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
        address: "",
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
            let address = this.address;
            let phone = this.phone;
            let blood_type = this.blood_type;
            let dob = this.dob;
            let gender = this.gender;
            let subcounty = this.subcounty;
            let is_patient = 1;
            let password = this.password;

            const data = {
                name,
                email,
                phone,
                address,
                blood_type,
                dob,
                gender,
                subcounty,
                is_patient,
                password
            };

            this.registerUser(data);
            this.name = "";
            this.email = "";
            this.password = "";
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
