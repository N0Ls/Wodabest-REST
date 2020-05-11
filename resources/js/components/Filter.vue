<template>
  <div class="extra-container">
    <div>

      <button :class="{ active: filter == 'all' }" @click="changeFilter('all')">
        All
      </button>

      <button
        v-for="category in allCategories"
        :key="category.slug"
        :class="{ active: filter == category.slug }"
        @click="changeFilter(category.slug)"
      >
        {{ $t(category.slug) }}
      </button>

    </div>
  </div>
</template>

<script>
export default {
  name: "v-filter",

  props: {
    type: String
  },

  computed: {
    filter() {
      return this.switchFilterFromType(this.type);
    },
    allCategories() {
      return this.$store.getters["categories/allCategories"];
    }
  },

  created() {
    this.$store.dispatch("categories/retrieveCategories");
  },
  
  methods: {
    changeFilter(filter) {
      this.$store.dispatch(this.type + "/updateFilter", filter);
    },
    switchFilterFromType(type) {
      const Types = {
        projects: this.$store.state.projects.filter,
        games: this.$store.state.games.filter,
        ranking: this.$store.state.ranking.filter,
      };

      return Types[type];
    }
  }
};
</script>
