<template>
    <div class="container">
        <div class="title">
            <h1>{{ eee }}</h1>
        </div>
      <div class="content">
        This is index page
        </div>
    </div>
</template>

<script>

    export default {
        data: () => {
            return {
                eee: "INDEX  PAGE"
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
                      'Authorization': 'Basic ' + config.public.apiKey,
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
