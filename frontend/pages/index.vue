<template>
    <div class="container">
        <div class="title">
            <h1>{{ eee }}</h1>
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
                await $fetch('http://pwa_back.lc/test', {
                    method: "post",
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
