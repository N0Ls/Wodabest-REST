<template>
  <div>
    <auth-filter />

    <v-filter type="projects" />

    <div v-if="projectsFiltered.length == 0" class="mt-4">
      <p>{{ $t("no_projects") }}</p>
    </div>

    <div v-else class="text-center mt-4">
      <p class="small text-muted para-desc mx-auto mb-0">
        {{ $t("result") + projectsFiltered.length + " " + (projectsFiltered.length > 1 ? $t("projects") : $t("project")) }}
      </p>
    </div>

    <div class="container">
      <div class="row projects-wrapper">
        <project-item
          v-for="project in projectsFiltered"
          :key="project.id"
          :project="project"
        />
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "projects-list",

  created() {
    this.$store.dispatch("projects/retrieveProjects");
  },

  computed: {
    count() {
      return this.$store.getters["projects/count"];
    },
    projectsFiltered() {
      return this.$store.getters["projects/projectsFiltered"];
    }
  }
};
</script>
