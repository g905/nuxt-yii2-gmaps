<template>
    <div class="container">
      <div class="title">
      <h1>{{ page }}</h1>
    </div>
    <GMap />

    </div>
</template>
<script>
    export default {
        head() {
            return {
            }
        },
        data: () => {
            return {
                page: "GMap Page"
            }
        },
        methods() {
        }
    }
</script>
<style>

</style>
