<template>
  <div>

    <v-filter type="games"></v-filter>

    <game-player
      :idWinner="players[0].id"
      :idLoser="players[1].id"
      :title="players[0].title"
      :img="players[0].filename"
    ></game-player>

    <game-player
      :idWinner="players[1].id"
      :idLoser="players[0].id"
      :title="players[1].title"
      :img="players[1].filename"
    ></game-player>

  </div>
</template>

<script>

export default {
  name: "game-view",

  created() {
    this.$store.dispatch("games/retrievePlayers");
  },

  computed: {
    players() {
      return this.$store.getters["games/getActivePlayers"];
    }
  }
};
</script>
