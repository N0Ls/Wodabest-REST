<template>
  <div class="project">
    <img :src="'/img/upload/' + project.filename" />
    <div class="project-left">
      <div>
        {{ title }}
      </div>
    </div>
    <div class="project-left">
      <div>{{ $t("score") + " " + score }}</div>
    </div>
    <div @click="goTodetail(id)">
      {{ $t("see_more") }}
    </div>
  </div>
</template>

<script>
import { mapGetters } from "vuex";

export default {
  name: "ranked-project-item",

  props: {
    project: {
      type: Object,
      required: true
    }
  },

  data() {
    return {
      id: this.project.id,
      owner: this.project.user_id,
      title: this.project.title,
      description: this.project.description,
      filename: this.project.filename,
      category: this.project.category_id,
      editing: this.project.editing,
      score: this.project.score,
      wins: this.project.wins,
      losses: this.project.losses,
      rank: this.project.rank,
      beforeEditCache: ""
    };
  },

  directives: {
    focus: {
      inserted: function(el) {
        el.focus();
      }
    }
  },

  computed: mapGetters({
    user: "auth/user"
  }),
  
  methods: {
    goTodetail(id) {
      this.$router.push({ name: "details", params: { id: id } });
    }
  }
};
</script>
