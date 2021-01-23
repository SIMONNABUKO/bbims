import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);
import Login from "../components/login/Login.vue";
import PatientList from "../components/patients/PatientList.vue";
import DonorsList from "../components/donors/DonorsList.vue";
import Patient from "../components/patients/SinglePatient.vue";
import Donor from "../components/donors/Profile.vue";
import Banks from "../components/banks/Banks.vue";
//FORMS
import PatientForm from "../components/forms/Patients.vue";
import DonorForm from "../components/forms/Donors.vue";
import BloodBankForm from "../components/forms/BloodBanks.vue";
//donations
import Donation from "../components/donations/Index.vue";
const routes = [
    // { path: "/register", component: Foo },
    { path: "/login", component: Login },
    { path: "/patients", component: PatientList },
    { path: "/donors", component: DonorsList },
    { path: "/patient", component: Patient },
    { path: "/donor", component: Donor },
    { path: "/banks", component: Banks },
    { path: "/donations", component: Donation },
    { path: "/register/patient", component: PatientForm },
    { path: "/register/donor", component: DonorForm },
    { path: "/register/bank", component: BloodBankForm }
    // { path: "/donors", component: Bar },
    // { path: "/donations", component: Bar }
];

const router = new VueRouter({
    routes, // short for `routes: routes`
    hashbang: false,
    mode: "history"
});
export default router;
