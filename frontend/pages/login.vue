<template>
    <div class="container">
        <div class="title text-center">
            <h1>{{ title }}</h1>
        </div>
      </div>
      <Login />
</template>

<script setup>
definePageMeta({
  layout: "auth"
})
</script>

<script>

    export default {
        data: () => {
            return {
                title: "Login page"
            }
        },
        mounted() {
        },
        methods: {

        }
    }
</script>

<style>

</style>
