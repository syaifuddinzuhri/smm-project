const state = {
    isLoggedIn: false,
    user: []
}

const mutations = {
    setLoggedIn(state, payload) {
        state.isLoggedIn = payload
    },
    setUser(state, payload) {
        state.user = payload
    },
}

const actions = {

}

export default {
    namespaced: true,
    state,
    mutations,
    actions
}
