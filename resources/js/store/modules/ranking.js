import axios from "axios";
import * as types from "../mutation-types";

// state
export const state = {
  filter: "all",
  topProjects: []
};

// getters
export const getters = {
  count(state) {
    return state.topProjects.length;
  },
  topProjects(state) {
    return state.topProjects;
  }
};

// mutations
export const mutations = {
  [types.RETRIEVE_TOP_PROJECTS](state, projects) {
    state.topProjects = projects;
  },
  [types.UPDATE_RANKING_FILTER](state, filter) {
    state.filter = filter;
    this.dispatch("ranking/retrieveTopProjects");
  }
};

// actions
export const actions = {
  retrieveTopProjects({ commit, state }) {
    axios
      .post("/api/projects/ranking/" + state.filter)
      .then(response => {
        commit(types.RETRIEVE_TOP_PROJECTS, response.data);
      })
      .catch(error => {
        console.log(error);
      });
  },
  updateFilter(context, filter) {
    context.commit(types.UPDATE_RANKING_FILTER, filter);
  }
};
