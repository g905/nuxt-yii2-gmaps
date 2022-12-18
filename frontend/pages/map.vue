<template>
    <div class="container">
        <div class="title">
            <h1>{{ eee }}</h1>
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
                eee: "GMap Page"
            }
        },
        methods() {
        }
    }
</script>
<style>

</style>
