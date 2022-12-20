<template>
    <div class="container">
        <div class="title">
            <h1 class="red">{{ test }}</h1>
        </div>
        <Test/>
    </div>
</template>

<script setup>

definePageMeta({
  middleware: 'names'
})

</script>

<script>
    export default {
        head() {
            return {
                title: "tetst"
            }
        },
        data() {
            return {
                test: "TEST PAGE"
            }

        },
        mounted() {
        }

    }
</script>


<style>
</style>
