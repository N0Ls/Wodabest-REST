import axios from "axios";
import * as types from "../mutation-types";

// state
export const state = {
  filter: "all",
  userFilter: false,
  dateFilter: false,
  projects: [],
  project: []
};

// getters
export const getters = {
  count(state) {
    return state.projects.length;
  },
  countFilteredProjects(state, getters, rootState, rootGetters) {
    return rootGetters["projects/projectsFiltered"].length;
  },
  project(state) {
    return state.project;
  },
  projectsFiltered(state, getters, rootState, rootGetters) {
    const projectsFilteredByCategories = switchFilter(
      state.filter,
      rootGetters["categories/allCategories"]
    );
    if (state.userFilter == true)
      return projectsFilteredByCategories.filter(
        project => project.user_id == rootGetters["auth/user"].id
      );
    return projectsFilteredByCategories;
  }
};

// mutations
export const mutations = {
  [types.RETRIEVE_PROJECTS](state, projects) {
    state.projects = projects;
  },
  [types.RETRIEVE_PROJECT](state, project) {
    state.project = project;
  },
  [types.ADD_PROJECT](state, project) {
    state.projects.push({
      id: project.id,
      owner: project.user_id,
      title: project.title,
      description: project.description,
      filename: project.image,
      category: project.category_id,
      editing: false,
      score: project.score,
      wins: project.wins,
      losses: project.losses,
      rank: project.rank
    });
  },
  [types.UPDATE_PROJECTS_FILTER](state, filter) {
    state.filter = filter;
  },
  [types.UPDATE_USER_FILTER](state, userFilter) {
    state.userFilter = userFilter;
  },
  [types.UPDATE_DATE_FILTER](state, dateFilter) {
    state.dateFilter = dateFilter;
  },
  [types.UPDATE_PROJECT](state, project) {
    const index = state.projects.findIndex(item => item.id == project.id);
    state.projects.splice(index, 1, {
      id: project.id,
      owner: project.owner,
      title: project.title,
      description: project.description,
      filename: project.filename,
      category: project.category,
      editing: project.editing,
      score: project.score,
      wins: project.wins,
      losses: project.losses,
      rank: project.rank
    });
    if (state.project.id == project.id) {
      state.project = project;
    }
  },
  [types.DELETE_PROJECT](state, id) {
    const index = state.projects.findIndex(item => item.id == id);
    state.projects.splice(index, 1);
  }
};

// actions
export const actions = {
  retrieveProjects(context) {
    axios
      .get("/api/projects")
      .then(response => {
        context.commit(types.RETRIEVE_PROJECTS, response.data);
      })
      .catch(error => {
        console.log(error);
      });
  },
  retrieveProject(context, id) {
    axios
      .get("/api/projects/" + id)
      .then(response => {
        context.commit(types.RETRIEVE_PROJECT, response.data);
      })
      .catch(error => {
        console.log(error);
      });
  },
  addProject(context, project) {
    axios
      .post("/api/projects", {
        user_id: project.user_id,
        title: project.title,
        description: project.description,
        category: project.category,
        image: project.image,
        category: project.category
      })
      .then(response => {
        context.commit(types.ADD_PROJECT, response.data);
        context.dispatch("retrieveProjects");
      })
      .catch(error => {
        console.log(error);
      });
  },
  updateFilter(context, filter) {
    context.commit(types.UPDATE_PROJECTS_FILTER, filter);
  },
  updateUserFilter(context, userFilter) {
    context.commit(types.UPDATE_USER_FILTER, userFilter);
  },
  updateDateFilter(context, dateFilter) {
    context.commit(types.UPDATE_DATE_FILTER, dateFilter);
  },
  updateProject(context, project) {
    axios
      .patch("/api/projects/" + project.id, {
        title: project.title,
        description: project.description
      })
      .then(response => {
        context.commit(types.UPDATE_PROJECT, response.data);
        // Actions below to fix
        context.dispatch("retrieveProjects");
      })
      .catch(error => {
        console.log(error);
      });
  },
  deleteProject(context, id) {
    axios
      .delete("/api/projects/" + id)
      .then(response => {
        context.commit(types.DELETE_PROJECT, id);
      })
      .catch(error => {
        console.log(error);
      });
  }
};

// Filter Object literal
const switchFilter = (filter, categories) => {
  let Categories = {};

  Object.defineProperty(Categories, "all", {
    value: state.projects,
    writable: true,
    enumerable: true,
    configurable: true
  });

  categories.forEach(category => {
    Object.defineProperty(Categories, category.slug, {
      value: state.projects.filter(
        project => project.category_id == category.id
      ),
      writable: true,
      enumerable: true,
      configurable: true
    });
  });

  return Categories[filter] || Categories.default;
};
