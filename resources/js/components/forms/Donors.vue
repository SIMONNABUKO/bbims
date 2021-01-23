<template>
    <v-container>
        <v-card>
            <v-card-title class="primary mt-10" style="color:#fff">
                Donors Registration Form
                <v-card-subtitle style="color:#fff">
                    Please Enter All The Details
                </v-card-subtitle>
            </v-card-title>

            <form @submit.prevent="getData" ref="donorForm">
                <div v-if="createUserMessage">
                    <v-alert type="success">{{ createUserMessage }}</v-alert>
                </div>
                <v-container fluid>
                    <v-row>
                        <v-col cols="6">
                            <v-text-field
                                v-model="name"
                                label="Donor Name"
                                required
                            ></v-text-field>
                            <v-text-field
                                v-model="email"
                                label="Donor Email"
                                required
                            ></v-text-field>
                            <v-text-field
                                v-model="phone"
                                label="Donor Phone"
                                required
                            ></v-text-field>
                            <v-text-field
                                v-model="blood_type"
                                label="Donor Blood Type"
                                required
                            ></v-text-field>

                            <v-text-field
                                v-model="password"
                                label="Donor's Password'"
                                required
                            ></v-text-field>
                            <v-btn
                                depressed
                                color="success"
                                class="mr-4"
                                type="submit"
                            >
                                Register Donor
                            </v-btn>
                        </v-col>
                        <v-col cols="6">
                            <v-text-field
                                v-model="address"
                                label="Donor's Address"
                                required
                            ></v-text-field>
                            <v-text-field
                                v-model="dob"
                                label="Donor's Date of Birth"
                                required
                            ></v-text-field>
                            <v-text-field
                                v-model="gender"
                                label="Donor's Gender"
                                required
                            ></v-text-field>
                            <v-text-field
                                v-model="subcounty"
                                label="Donor's Sub-Country"
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
            let address = this.address;
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
                address,
                gender,
                subcounty,
                is_donor,
                password
            };

            this.registerUser(data);
            this.$refs.donorForm.reset();
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
