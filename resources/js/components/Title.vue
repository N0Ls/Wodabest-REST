<template>
  <div class="title">
    <h1>{{ title }}</h1>
  </div>
</template>

<script>
export default {
  name: "page-title",

  props: {
    title: { type: String, default: null }
  }
};
</script>
