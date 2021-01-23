import axios from "axios";
import { parseJSON } from "jquery";
const state = {
    showSideMenu: false,
    authUser: [],
    patients: [],
    donors: [],
    bloodBanks: [],
    users: [],
    isLoading: false,
    createUserMessage: ""
};

const getters = {
    showSideMenu: state => state.showSideMenu,
    isLoading: state => state.isLoading,
    bloodBanks: state => state.bloodBanks,
    patients: state => state.patients,
    donors: state => state.donors,
    authUser: state => state.authUser,
    createUserMessage: state => state.createUserMessage
};

const actions = {
    loginUser({ commit }, data) {
        var settings = {
            async: true,
            crossDomain: true,
            url: "http://127.0.0.1:8000/api/auth/login",
            method: "POST",
            headers: {
                "content-type": "application/x-www-form-urlencoded"
            },
            data: data
        };

        $.ajax(settings).done(function(response) {
            window.localStorage.removeItem("access_token");
            window.localStorage.setItem(
                "access_token",
                JSON.stringify(response)
            );
            console.log("token saved successfully");
            window.location.href = "/";
        });
    },
    currentUser({ commit }) {
        const token = window.localStorage.getItem("access_token");
        let accessToken = JSON.parse(token);
        let tocen = accessToken.access_token;
        var settings = {
            async: true,
            crossDomain: true,
            url: `http://127.0.0.1:8000/api/auth/me?token=${tocen}`,
            method: "POST",
            headers: {
                "content-type": "application/x-www-form-urlencoded"
            }
        };

        $.ajax(settings).done(function(response) {
            commit("setAuthUser", response);
        });
    },

    fetchUsers({ commit }) {
        axios
            .get("/api/users")
            .then(response => {
                const users = response.data.data;
                let encodedUsers = JSON.stringify(users);
                window.localStorage.removeItem("users");
                window.localStorage.setItem("users", encodedUsers);
                console.log(users);
            })
            .catch(error => {
                // handle error
                console.log(error);
            });
    },
    registerUser({ commit }, data) {
        commit("setIsLoading", true);
        axios
            .post("/api/new/user", data)
            .then(response => {
                let msg = response.data.message;
                commit("setCreateUserMessage", msg);
            })
            .catch(err => console.log(err));
        commit("setIsLoading", false);
    },
    setData({ commit }) {
        commit("setIsLoading", true);
        const localHostUsers = window.localStorage.getItem("users");
        let users = JSON.parse(localHostUsers);
        let patients = users.filter(user => user.is_patient == 1);
        let bloodBanks = users.filter(user => user.is_blood_bank == 1);
        let donors = users.filter(user => user.is_donor == 1);

        commit("setPatients", patients);
        commit("setBloodBanks", bloodBanks);
        commit("setDonors", donors);
        commit("setIsLoading", false);
        console.log(users, "data set succcessfully!");
    },

    showSideMenu({ commit }) {
        commit("setShowSideMenu", !state.showSideMenu);
    },
    closeSideMenu({ commit }) {
        commit("setShowSideMenu", false);
    }
};
const mutations = {
    setShowSideMenu: (state, showSideMenu) =>
        (state.showSideMenu = showSideMenu),
    setUsers: (state, users) => (state.users = users),
    setPatients: (state, patients) => (state.patients = patients),
    setDonors: (state, donors) => (state.donors = donors),
    setBloodBanks: (state, bloodBanks) => (state.bloodBanks = bloodBanks),
    setAuthUser: (state, authUser) => (state.authUser = authUser),
    setIsLoading: (state, isLoading) => (state.isLoading = isLoading),
    setCreateUserMessage: (state, createUserMessage) =>
        (state.createUserMessage = createUserMessage)
};

export default {
    state,
    getters,
    actions,
    mutations
};
