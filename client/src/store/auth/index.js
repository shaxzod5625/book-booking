import api from "@/services/api.js";

export default {
    namespace: true,
    state: {
        user: null
    },
    getters: {
        user(state) {
            return state.user;
        }
    },
    mutations: {
        setUser(state, user) {
            state.user = user;
            localStorage.setItem("user", JSON.stringify(user));
            localStorage.setItem("token", user.token);
        }
    },
    actions: {
        async fetchUser({ commit }, user) {
            try {
                const res = await api().get("/getUser");
                commit("setUser", res.data);
            } catch (e) {
                console.error(e.response)
                throw e
            }
        }
    }
}