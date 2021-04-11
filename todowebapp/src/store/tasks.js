import tasks from "@/services/tasks";

const Mutations = {
    'CREATE_TASK': 'createTask',
    'DELETE_TASK': 'deleteTask',
    'SET_DRAGGING': 'setDragging',
    'SET_TASKS': 'setTasks',
    'UPDATE_TASK': 'updateTask',
}

export default {
    state: {
        dragging: false,
        tasks: [],
    },
    mutations: {
        [Mutations.CREATE_TASK](state, payload) {
            state.tasks.push(payload)
        },
        [Mutations.DELETE_TASK](state, id) {
            const index = state.tasks.findIndex(task => {
                return task.id === id
            })

            state.tasks.splice(index, 1)
        },
        [Mutations.SET_DRAGGING](state, payload) {
            state.dragging = payload
        },
        [Mutations.SET_TASKS](state, payload) {
            state.tasks = payload
        },
        [Mutations.UPDATE_TASK](state, payload) {
            const index = state.tasks.findIndex(task => {
                return task.id === payload.id
            })

            state.tasks[index] = payload
        }
    },
    actions: {
        createTask({commit}, payload) {
            return tasks.create(payload)
                .then(response => {
                    commit(Mutations.CREATE_TASK, response)

                    return response
                })
        },
        deleteTask({commit}, id) {
            return tasks.delete(id)
                .then(response => {
                    commit(Mutations.DELETE_TASK, id)

                    return response
                })
        },
        loadTasks({commit}) {
            return tasks.index()
                .then(response => {
                    commit(Mutations.SET_TASKS, response)

                    return response
                })
        },
        setDragging({commit}, payload) {
            commit(Mutations.SET_DRAGGING, payload)
        },
        updateTask({commit}, payload) {
            return tasks.update(payload)
                .then(response => {
                    commit(Mutations.UPDATE_TASK, response)

                    return response
                })
        },
    },
}