const state = {
    isLoggedIn: false,
    user: {},
    token: null
}

const mutations = {
    setIsLoggedIn(state, payload) {
        state.isLoggedIn = payload
    },
    setUser(state, payload) {
        state.user = payload
    },
    setToken(state, payload) {
        state.token = payload
    },
}

const actions = {
    async memberLogin({ commit }, payload) {
        const response = await axios.post('/member/login', payload);
        if (response && response.status == 200) {
            commit('setUser', response.data.data.user)
            commit('setToken', response.data.data.token)
            commit('setIsLoggedIn', true)
            localStorage.setItem('token', state.token)
        }
        return response
    },
    async adminLogin({ commit }, payload) {
        const response = await axios.post('/admin/login', payload);
        if (response && response.status == 200) {
            commit('setUser', response.data.data.user)
            commit('setToken', response.data.data.token)
            commit('setIsLoggedIn', true)
            localStorage.setItem('token', state.token)
        }
        return response
    }
}

export default {
    namespaced: true,
    state,
    mutations,
    actions
}
