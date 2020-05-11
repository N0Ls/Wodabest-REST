<template>
  <div>
    <page-title :title="$t('home')"></page-title>

    <p>{{ $t("Hello") + " " + user.name }}</p>
    <p>{{ countCategories + " " + $t("categories") }}</p>
    <p>{{ countUsers + " " + $t("users") }}</p>
    <p>{{ countProjects + " " + $t("projects") }}</p>
    <p>{{ countGames + " " + $t("games_played") }}</p>
    <about :text="$t('introduction_text')"></about>

    <v-button
      ><router-link :to="{ name: 'game' }">
        {{ $t("play") }}
      </router-link></v-button
    >

    <a @click="$router.go(-1)">{{ $t("back") }}</a>
  </div>
</template>

<script>
import { mapGetters } from "vuex";

export default {
  middleware: "auth",

  computed: {
    ...mapGetters({ user: "auth/user" }),
    countCategories() {
      return this.$store.getters["categories/count"];
    },
    countUsers() {
      return this.$store.getters["users/count"];
    },
    countProjects() {
      return this.$store.getters["projects/count"];
    },
    countGames() {
      return this.$store.getters["games/count"];
    }
  },

  created() {
    this.$store.dispatch("users/retrieveUsers");
    this.$store.dispatch("categories/retrieveCategories");
    this.$store.dispatch("projects/retrieveProjects");
    this.$store.dispatch("games/retrieveGames");
  },

  metaInfo() {
    return { title: this.$t("home") };
  }
};
</script>
