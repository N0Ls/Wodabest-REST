<template>
  <div>
    <page-title
      :title="$t('ranking')"
      :text="$t('Texte d\'introduction de la page')"
    ></page-title>
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
