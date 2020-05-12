<template>
  <div>
    <!--<page-title :title="$t('project_details')"></page-title>-->
    <page-title :title="project.title"></page-title>
    <details-view :project="project"></details-view>
  </div>
</template>

<script>
export default {
  middleware: "auth",

  created() {
    this.$store.dispatch("projects/retrieveProject", this.$route.params.id);
  },

  computed: {
    project() {
      return this.$store.getters["projects/project"];
    }
  },

  metaInfo() {
    return { title: this.$t("project") };
  }
};
</script>
