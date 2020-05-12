<template>
      <div class="container">
        <div class="row pt-2">
          <ul
            class="col container-filter list-unstyled categories-filter text-center mb-0"
          >
            <li class="list-inline-item">
              <a
              @click="changeFilter('all')"
                :class="{ active: filter == 'all' }"
                class="categories d-block text-muted rounded"
                >{{ $t('all') }}</a
              >
            </li>
            <li v-for="category in allCategories"
          :key="category.slug" class="list-inline-item">
              <a
                @click="changeFilter(category.slug)"
                :class="{ active: filter == category.slug }"
                class="categories d-block text-muted rounded"
                >{{ $t(category.slug) }}</a
              >
            </li>
          </ul>
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
        ranking: this.$store.state.ranking.filter
      };

      return Types[type];
    }
  }
};
</script>

<style scoped>
.section {
  padding: 100px 0;
  position: relative;
}

.container-filter li a {
  font-size: 14px;
  padding: 0px 5px;
  margin: 0 5px;
  font-weight: 600;
  letter-spacing: 0.8px;
  cursor: pointer;
  line-height: 34px;
  -webkit-transition: all 0.5s ease;
  transition: all 0.5s ease;
}

.container-filter li a:hover {
  color: #3c4858 !important;
}

.container-filter li a.active {
  color: #00c9a7 !important;
}
</style>
