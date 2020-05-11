<template>
  <card :title="'Ajouter un projet'">

    <form @submit.prevent="addProject" @keydown="form.onKeydown($event)">

      <!-- Image -->
      <div class="form-group row">
        <label class="col-md-3 col-form-label text-md-right">Image</label>
        <div class="col-md-7">
          <input @change="imageChanged" class="form-control" type="file" name="image" />
        </div>
      </div>

      <!-- Title -->
      <div class="form-group row">
        <label class="col-md-3 col-form-label text-md-right">{{ $t('title') }}</label>
        <div class="col-md-7">
          <input
            v-model="form.title"
            class="form-control"
            type="text"
            name="title"
          />
        </div>
      </div>

      <!-- Description -->
      <div class="form-group row">
        <label class="col-md-3 col-form-label text-md-right">{{ $t('description') }}</label>
        <div class="col-md-7">
          <textarea
            v-model="form.description"
            class="form-control"
            type="text"
            name="description"
          />
        </div>
      </div>

      <!-- Categories -->
      <div class="form-group row">
        <label class="col-md-3 col-form-label text-md-right">{{ $t('category') }}</label>
        <div class="col-md-7">
          <select class="form-control" v-model="form.category">
            <option disabled value="">{{ $t('assign_category') }}</option>
            <option v-for="category in allCategories" :key="category.name">
              {{ $t(category.slug) }}
            </option>
          </select>
        </div>
      </div>

      <div v-show="!(form.title && form.description && form.category && form.image)">
        <div class="col-md-9 ml-md-auto">{{ $t('form_rule') }}</div>
      </div>

      <!-- Submit Button -->
      <div v-show="form.title && form.description && form.category && form.image" class="form-group row">
        <div class="col-md-9 ml-md-auto">
          <v-button :loading="form.busy" type="success">
            {{ $t('create') }}
          </v-button>
        </div>
      </div>

    </form>

  </card>
</template>

<script>
import Form from "vform";
import { mapGetters } from "vuex";

export default {
  name: "create-form",

  data: () => ({
    form: new Form({
      title: "",
      description: "",
      category: ""
    })
  }),

  created() {
    this.$store.dispatch("categories/retrieveCategories");
  },

  computed: {
    ...mapGetters({ user: "auth/user" }),
    allCategories() {
      return this.$store.getters["categories/allCategories"];
    }
  },
  
  methods: {
    getAllCategories() {
      return this.$store.getters["categories/allCategories"];
    },
    imageChanged(e) {
      let fileReader = new FileReader();
      fileReader.readAsDataURL(e.target.files[0]);
      fileReader.onload = e => {
        this.form.image = e.target.result;
      };
    },
    async addProject() {

      this.$store.dispatch("projects/addProject", {
        user_id: this.user.id,
        title: this.form.title,
        description: this.form.description,
        category: this.form.category,
        image: this.form.image
      });

      this.form.reset();

      this.$router.push("/images");
    }
  }
};
</script>
