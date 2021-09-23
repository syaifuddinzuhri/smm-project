import Vue from 'vue'
import Vuex from 'vuex'

// Import modules
import user from './user'
import auth from './auth'

Vue.use(Vuex)
export default new Vuex.Store({
    state: {},
    mutations: {},
    actions: {},
    modules: {
        auth
    },
})
