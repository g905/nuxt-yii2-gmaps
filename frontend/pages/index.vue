<template>
  <div class="container">
    <div class="title">
      <h1>{{ title }}</h1>
    </div>
  </div>
</template>

<script setup>
definePageMeta({
  middleware: ["auth"]
})
</script>

<script>

    export default {
        data: () => {
            return {
                title: "INDEX  PAGE"
            }
        },
        mounted() {
            this.v();
        },
        methods: {
            async v() {

                const config = useRuntimeConfig();
                await $fetch('test', {
                    method: "post",
                    baseURL: config.public.apiBase,
                    headers: {
                      'Authorization': 'Bearer ' + localStorage.getItem("access_token"),
                    },
                    body: {
                        data: {
                            name: "asdf",
                            description: "asdffgh"
                        }
                    }
                })
                        .then((data) => {
                            console.log(data);
                        })
            }
        }
    }
</script>

<style>

</style>
