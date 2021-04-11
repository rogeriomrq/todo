import taskTypes from "@/services/taskTypes";

const Mutations = {
    'SET_TASK_TYPES' : 'setTaskTypes'
}

export default {
    state: {
        taskTypes : []
    },
    mutations: {
        [Mutations.SET_TASK_TYPES](state, payload) {
            state.taskTypes = payload
        }
    },
    actions: {
        loadTaskTypes({ commit }) {
            return taskTypes.index()
                .then(response => {
                    commit(Mutations.SET_TASK_TYPES, response)
                    
                    return response
                })
        }
    },
}