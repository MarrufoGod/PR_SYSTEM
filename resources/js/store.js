// resources/js/store.js
import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

export default new Vuex.Store({
  state: {
    isLoggedIn: false
  },
  mutations: {
    setLoggedIn(state, status) {
      state.isLoggedIn = status;
    }
  },
  actions: {
    checkAuthStatus({ commit }) {
      return axios.get('/user')
        .then(response => {
          commit('setLoggedIn', true);
        })
        .catch(error => {
          commit('setLoggedIn', false);
        });
    }
  }
});