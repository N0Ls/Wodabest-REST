<template>
        <p>{{ text }}</p>
</template>

<script>
export default {
  name: 'about',

  props: {
    text: { type: String }
  }
}
</script>
