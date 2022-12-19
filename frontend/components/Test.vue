<template>
    <div>
        <h2>This is the {{ name }} component</h2 >
        <button @click="tesat" class="btn btn-info my-2">btn</button>
        <div class="images">
            <div class="image" v-for="img in images">
                <img :src="img" alt="">
            </div>
        </div>
        <div>
            <button @click="post" class="btn btn-info my-2">POST requestd</button>
        </div>
        <div v-if="postr" class="postr">
            <div class="name">{{ postr.name }}</div>
            <div class="descr">{{ postr.description }}</div>

        </div>
    </div>


</template>

<script>

    export default {
        data() {
            return {
                name: "Test",
                images: [],
                pic: null,
                postr: null,
            }
        },
        methods: {
            async tesat() {
                await $fetch('https://picsum.photos/seed/csdvb/300/300')
                        .then((response) => response)
                        .then((data) => {
                            this.images.push(URL.createObjectURL(data));
                        });
            },
            async post() {
                await $fetch('http://pwa_back.lc/api/v1/test', {
                    method: 'post',
                    headers: {
                        'Authorization': 'Basic TFV6Rklqc2JzX0QyczFWV243WFpDQkJBMmlZTG11ZUg6',
                    },
                    body: {
                        data: {
                            name: "test name",
                            description: "test data"
                        }
                    }
                })
                        .then((data) => {
                            this.postr = data;
                        });
            }
        },
        mounted() {
            //this.tesat();
        },

    }
</script>

<style>
    .images {
        display: flex;
    }
    .postr {
        width: 500px;
        display: flex;
        justify-content: space-between;
        background: lightgray;
        padding: 1rem;
    }
</style>
