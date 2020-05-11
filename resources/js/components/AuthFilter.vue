<template>
  <div class="extra-container">
    <div>
      <button
        :class="{ active: filter == false }"
        @click="changeUserFilter(false)"
      >
        All users
      </button>

      <button
        :class="{ active: filter == true }"
        @click="changeUserFilter(true)"
      >
        Your images
      </button>
    </div>
  </div>
</template>

<script>
export default {
  name: "auth-filter",

  computed: {
    filter() {
      return this.$store.state.projects.userFilter;
    }
  },

  methods: {
    changeUserFilter(filter) {
      this.$store.dispatch("projects/updateUserFilter", filter);
    }
  }
};
</script>
