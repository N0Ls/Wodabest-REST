<template>
  <div class="container text-white bg-dark">
    <p>{{ appName }} footer component</p>
  </div>
</template>

<script>
export default {
  name: "v-footer",

  data: () => ({
    appName: window.config.appName
  })
};
</script>
