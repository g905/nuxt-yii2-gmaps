<template>
    <div class="container">
        <div class="title">
            <h1 class="red">{{ tesdt }}</h1>
        </div>
        <div ref="ff">wewewe</div>
        <Test/>
    </div>
</template>

<script>
    export default {
        head() {
            return {
                title: "tetst"
            }
        },
        data() {
            return {
                tesdt: "WOW PAGE"
            }

        },
        mounted() {
            console.log(this.$refs['ff']);
        }

    }
</script>

<script setup>
    title: "ASdf"
</script>

<style>
    .red {
        color: red;
    }
</style>
