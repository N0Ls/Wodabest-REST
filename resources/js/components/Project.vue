<template>
  <div class="project">
    <img :src="'/img/upload/' + project.filename" />
    <div class="project-left">
      <div v-if="user.id == owner">
        <div v-if="!editing" @dblclick="editProject" class="project-label">
          {{ title }}
        </div>
        <input
          v-else
          class="project-edit"
          type="text"
          v-model="title"
          @blur="doneEdit"
          @keyup.enter="doneEdit"
          @keyup.esc="cancelEdit"
          v-focus
        />
      </div>
      <div v-else>
        {{ title }}
      </div>
    </div>
    <div>{{ $t("create_by") + " " + author }}</div>
    <div @click="goTodetail(id)">
      {{ $t("see_more") }}
    </div>
    <div
      v-if="user.id == owner"
      class="remove-item"
      @click="removeProject(project.id)"
    >
      {{ $t("delete") }}
    </div>
  </div>
</template>

<script>
import { mapGetters } from "vuex";

export default {
  name: "project-item",

  props: {
    project: {
      type: Object,
      required: true
    }
  },

  data() {
    return {
      id: this.project.id,
      author: "",
      owner: this.project.user_id,
      title: this.project.title,
      description: this.project.description,
      filename: this.project.filename,
      category: this.project.category_id,
      editing: false,
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

  created() {
    this.getAuthorName(this.owner);
  },

  computed: mapGetters({
    user: "auth/user"
  }),
  
  methods: {
    removeProject(id) {
      this.$store.dispatch("projects/deleteProject", id);
    },
    editProject() {
      this.beforeEditCache = this.title;
      this.editing = true;
    },
    doneEdit() {
      if (this.title.trim() == "") {
        this.title = this.beforeEditCache;
      }
      this.editing = false;

      this.$store.dispatch("projects/updateProject", {
        id: this.id,
        owner: this.owner,
        title: this.title,
        description: this.description,
        filename: this.filename,
        category: this.category,
        editing: this.editing,
        score: this.score,
        wins: this.wins,
        losses: this.losses,
        rank: this.rank
      });
    },
    cancelEdit() {
      this.title = this.beforeEditCache;
      this.editing = false;
    },
    goTodetail(id) {
      this.$router.push({ name: "details", params: { id: id } });
    },
    async getAuthorName(id) {
      let response = await this.$store.dispatch("users/getAuthorName", id);
      this.author = response;
    }
  }
};
</script>
