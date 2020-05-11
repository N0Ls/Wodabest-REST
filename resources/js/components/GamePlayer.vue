<template>
  <div>

    <form @submit.prevent="update" @keydown="form.onKeydown($event)">

      <div class="form-group">
        <input
          v-model="form.winner"
          type="hidden"
          class="form-control"
          name="winner"
        />
        <input
          v-model="form.loser"
          type="hidden"
          class="form-control"
          name="loser"
        />
      </div>

      <div>
        <button type="submit" class="portfolio-item text-center">
          <img :src="'/img/upload/' + filename" />
        </button>
        <div class="portfolio-meta">
          <h2>{{ projectTitle }}</h2>
        </div>
      </div>

    </form>

  </div>
</template>

<script>
import Form from "vform";

export default {
  name: "game-player",

  props: {
    title: String,
    idWinner: Number,
    idLoser: Number,
    img: String
  },

  data: function() {
    return {
      form: new Form({
        winner: this.idWinner,
        loser: this.idLoser
      }),
      projectTitle: this.title,
      filename: this.img
    };
  },

  watch: {
    title: function() {
      this.updateData();
    }
  },
  
  methods: {
    async update() {
      this.$store.dispatch("games/updateScores", {
        winner: this.form.winner,
        loser: this.form.loser
      });
    },
    updateData() {
      this.form.winner = this.idWinner;
      this.form.loser = this.idLoser;
      this.projectTitle = this.title;
      this.filename = this.img;
    }
  }
};
</script>
