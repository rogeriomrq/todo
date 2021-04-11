import auth from "@/services/auth";

const Mutations = {
    LOGOUT: 'logout',
    SET_USER: 'setUser'
}

export default {
  state: {
      user: {},
      accessToken: false
  },
  mutations: {
      [Mutations.LOGOUT] (state) {
          state.accessToken = false,
              state.user = {}
      },
      [Mutations.SET_USER] (state, payload) {
          state.user = payload
      }
  },
  actions: {
      login({ commit }, data) {
          return auth.login(data)
              .then(response => {
                  commit(Mutations.SET_USER, response.user)
                  localStorage.setItem('user', JSON.stringify(response.user))
                  localStorage.setItem('accessToken', response.access_token)
                  
                  return response
              })
      },
      logout({ commit }) {
          return auth.logout()
              .then(response => {
                  commit(Mutations.LOGOUT)
                  localStorage.setItem('user', undefined)
                  localStorage.setItem('accessToken', undefined)
                  
                  return response
              })
      }
  },
}