<template>
  <div class="col-lg-3 col-md-6 col-12 mt-4 pt-2 branding">
    <div
      class="shadow-large work-container work-modern position-relative d-block overflow-hidden rounded"
    >
      <img
        :src="'/img/upload/' + project.filename"
        class="img-fluid"
        alt="work-image"
      />
      <div class="overlay-work bg-dark"></div>
      <div class="icons text-center">
        <a
          @click="goTodetail(id)"
          class="cursor text-primary work-icon bg-white d-inline-block rounded-pill mfp-image"
          ><i data-feather="camera" class="fea icon-sm"></i
        ></a>
      </div>
      <div class="content p-3">
        <div v-if="user.id == owner">
          <h5
            v-if="!editing"
            @dblclick="editProject"
            class="mb-0 text-white title"
          >
            {{ title }}
          </h5>
          <input
            v-else
            class="form-control"
            type="text"
            v-model="title"
            @blur="doneEdit"
            @keyup.enter="doneEdit"
            @keyup.esc="cancelEdit"
            v-focus
          />
        </div>
        <div v-else>
          <h5 class="mb-0 text-white title">
            {{ title }}
          </h5>
        </div>
        <h6 class="text-light tag mb-0">
          {{ $t("create_by") + " " + author }}
        </h6>
        <div
          v-if="user.id == owner"
          class="remove-item"
          @click="removeProject(project.id)"
        >
          {{ $t("delete") }}
        </div>
      </div>
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
