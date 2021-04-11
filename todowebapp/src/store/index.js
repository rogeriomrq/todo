import Vue from 'vue'
import Vuex from 'vuex'
import axios from "axios";
import auth from './auth'
import tasks from "./tasks";
import taskTypes from "./taskTypes";

Vue.use(Vuex)

const Mutations = {
    INITIALIZE_STORE: 'initializeStore'
}

export default new Vuex.Store({
    state: {
        ...tasks.state,
        ...taskTypes.state
    },
    mutations: {
        [Mutations.INITIALIZE_STORE](state) {
            state.accessToken = localStorage.getItem('accessToken')
            state.user = JSON.parse(localStorage.getItem('user'))
        },
        ...tasks.mutations,
        ...taskTypes.mutations
    },
    actions: {
        initializeStore({commit, state}) {
            commit(Mutations.INITIALIZE_STORE)
            const token = state.accessToken
            
            if(token) {
                axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;
            }
        },
        ...tasks.actions,
        ...taskTypes.actions
    },
    modules: {
        auth,
    }
})
