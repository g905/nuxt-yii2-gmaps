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
                await $fetch('http://pwa_back.lc/api/v1/test', {
                    method: "post",
                    headers: {
                      'Authorization': 'Basic TFV6Rklqc2JzX0QyczFWV243WFpDQkJBMmlZTG11ZUg6',
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
