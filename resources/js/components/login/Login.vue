<template>
    <v-container fill-height>
        <v-row justify="center" align="center">
            <v-col cols="12" sm="4">
                <v-card>
                    <v-card-title>Login Form</v-card-title>
                    <v-card-subtitle>Login To Continue</v-card-subtitle>
                    <v-card-text>
                        <form @submit.prevent="sendFormData">
                            <v-text-field
                                v-model="email"
                                label="E-mail"
                                required
                            ></v-text-field>
                            <v-text-field
                                v-model="password"
                                label="Password"
                                type="password"
                                required
                            ></v-text-field>

                            <v-btn
                                depressed
                                color="success"
                                class="mr-4"
                                type="submit"
                            >
                                Login
                            </v-btn>
                        </form>
                    </v-card-text>
                </v-card>
            </v-col>
        </v-row>
    </v-container>
</template>

<script>
import { mapActions, mapGetters } from "vuex";
export default {
    data: {
        email: "",
        password: ""
    },

    methods: {
        sendFormData(e) {
            e.preventDefault();
            let email = this.email;
            let password = this.password;
            return this.loginUser({ email, password });
        },
        ...mapActions({
            loginUser: "loginUser"
        })
    },
    mounted() {
        console.log("Component mounted.");
    }
};
</script>
