<template>
  <div>
    <page-title :title="$t('ranking')"></page-title>
    <ranked-projects-list></ranked-projects-list>
  </div>
</template>

<script>
export default {
  middleware: "auth",

  metaInfo() {
    return { title: this.$t("ranking") };
  }
};
</script>
