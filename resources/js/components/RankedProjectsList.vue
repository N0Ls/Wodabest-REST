<template>
  <div>
    <v-filter type="ranking"></v-filter>
    <transition-group
      name="fade"
      enter-active-class="animated fadeInUp"
      leave-active-class="animated fadeOutDown"
    >
      <ranked-project-item
        v-for="project in topProjects"
        :key="project.id"
        :project="project"
      />
    </transition-group>

    <div class="extra-container">
      <div>{{ count + " " + $t("projects") }}</div>
    </div>
  </div>
</template>

<script>
export default {
  name: "ranked-projects-list",

  created() {
    this.$store.dispatch("ranking/retrieveTopProjects");
  },
  
  computed: {
    count() {
      return this.$store.getters["ranking/count"];
    },
    topProjects() {
      return this.$store.getters["ranking/topProjects"];
    }
  }
};
</script>

<style lang="scss">
@import url("https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css");

.input {
  width: 100%;
  padding: 10px 18px;
  font-size: 18px;
  margin-bottom: 16px;

  &:focus {
    outline: 0;
  }
}

.project {
  margin-bottom: 12px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  animation-duration: 0.3s;
}

.remove-project {
  cursor: pointer;
  margin-left: 14px;
  &:hover {
    color: black;
  }
}

.item-left {
  // later
  display: flex;
  align-items: center;
}

.project-label {
  padding: 10px;
  border: 1px solid white;
  margin-left: 12px;
}

.project-edit {
  font-size: 24px;
  color: #2c3e50;
  margin-left: 12px;
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc; //override defaults
  font-family: "Avenir", Helvetica, Arial, sans-serif;

  &:focus {
    outline: none;
  }
}

.extra-container {
  display: flex;
  align-items: center;
  justify-content: space-between;
  font-size: 16px;
  padding-top: 14px;
  margin-bottom: 14px;
}

button {
  font-size: 14px;
  background-color: white;
  appearance: none;

  &:hover {
    text-decoration: underline;
  }

  &:focus {
    outline: none;
  }
}

.active {
  text-decoration: underline;
}

.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.2s;
}

.fade-enter,
.fade-leave-to {
  opacity: 0;
}

img {
  height: 90px;
  width: auto;
}
</style>
