<template>
  <div class="project">

    <img :src="'/img/upload/' + project.filename" />

    <div class="project-left">
      <div v-if="user.id == owner">
        <div
          v-if="!editingTitle"
          @dblclick="editProjectTitle"
          class="project-label"
        >
          {{ title }}
        </div>
        <input
          v-else
          class="project-edit"
          type="text"
          v-model="title"
          @blur="doneEditTitle"
          @keyup.enter="doneEditTitle"
          @keyup.esc="cancelEditTitle"
          v-focus
        />
      </div>
      <div v-else>
        {{ title }}
      </div>
    </div>

    <div class="project-left">
      <div v-if="user.id == owner">
        <div
          v-if="!editingDescription"
          @dblclick="editProjectDescription"
          class="project-label"
        >
          {{ description }}
        </div>
        <input
          v-else
          class="project-edit"
          type="text"
          v-model="description"
          @blur="doneEditDescription"
          @keyup.enter="doneEditDescription"
          @keyup.esc="cancelEditDescription"
          v-focus
        />
      </div>
      <div v-else>
        {{ description }}
      </div>
    </div>

    <a @click="$router.go(-1)">back</a>

  </div>
</template>

<script>
import { mapGetters } from "vuex";

export default {
  name: "details-view",

  props: ["project"],

  data() {
    return {
      id: this.project.id,
      owner: this.project.user_id,
      title: this.project.title,
      description: this.project.description,
      filename: this.project.filename,
      category: this.project.category_id,
      editingTitle: false,
      editingDescription: false,
      score: this.project.score,
      wins: this.project.wins,
      losses: this.project.losses,
      rank: this.project.rank,
      beforeEditCache: ""
    };
  },

  watch: {
    project: function() {
      this.updateData();
    }
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
    editProjectTitle() {
      this.beforeEditCache = this.title;
      this.editingTitle = true;
    },
    doneEditTitle() {
      if (this.title.trim() == "") {
        this.title = this.beforeEditCache;
      }
      this.editingTitle = false;

      this.updateProject();
    },
    cancelEditTitle() {
      this.title = this.beforeEditCache;
      this.editingTitle = false;
    },
    editProjectDescription() {
      this.beforeEditCache = this.description;
      this.editingDescription = true;
    },
    doneEditDescription() {
      if (this.description.trim() == "") {
        this.description = this.beforeEditCache;
      }
      this.editingDescription = false;

      this.updateProject();
    },
    cancelEditDescription() {
      this.description = this.beforeEditCache;
      this.editingDescription = false;
    },
    updateData() {
      (this.id = this.project.id),
        (this.owner = this.project.user_id),
        (this.title = this.project.title),
        (this.description = this.project.description),
        (this.filename = this.project.filename),
        (this.category = this.project.category_id),
        (this.editingTitle = false),
        (this.editingDescription = false),
        (this.score = this.project.score),
        (this.wins = this.project.wins),
        (this.losses = this.project.losses),
        (this.rank = this.project.rank),
        (this.beforeEditCache = "");
    },
    updateProject() {
      this.$store.dispatch("projects/updateProject", {
        id: this.id,
        owner: this.owner,
        title: this.title,
        description: this.description,
        filename: this.filename,
        category: this.category,
        score: this.score,
        wins: this.wins,
        losses: this.losses,
        rank: this.rank
      });
    }
  }
};
</script>
