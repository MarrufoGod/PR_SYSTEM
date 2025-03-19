import Vue from 'vue';
import Vuex from 'vuex';
import axios from 'axios'; // Asegúrate de tener axios importado

Vue.use(Vuex);

export default new Vuex.Store({
  state: {
    isLoggedIn: false,  // Estado para el login
    categories: []      // Estado para las categorías
  },
  mutations: {
    setLoggedIn(state, status) {
      state.isLoggedIn = status; // Mutación para cambiar el estado de login
    },
    setCategories(state, categories) {
      state.categories = categories; // Mutación para actualizar las categorías
    }
  },
  actions: {
    checkAuthStatus({ commit }) {
      return axios.get('/user')  // Consulta a la API para verificar el login
        .then(response => {
          commit('setLoggedIn', true); // Si la respuesta es exitosa, actualizamos el estado de login
        })
        .catch(error => {
          commit('setLoggedIn', false); // Si hay un error, actualizamos el estado de login a falso
        });
    },
    fetchCategories({ commit }) {
      // Solicitud para obtener las categorías desde la API
      axios.get('/api/categories') // Asegúrate de que esta ruta apunte a tu controlador de categorías
        .then(response => {
          commit('setCategories', response.data); // Guardamos las categorías en el estado
        })
        .catch(error => {
          console.error('Error fetching categories:', error);
        });
    }
  },
  getters: {
    categories: (state) => state.categories, // Getter para acceder a las categorías
    isLoggedIn: (state) => state.isLoggedIn  // Getter para acceder al estado de login
  }
});
