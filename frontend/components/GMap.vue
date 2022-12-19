<template>
    <div class="map" ref="map"></div>
</template>

<script>
    import { Loader } from "@googlemaps/js-api-loader"
    export default {
        data() {
            return {
                name: "Google maps component",
                mapContainer: null,
            }
        },
        methods: {
            loadMap(el) {
                var self = this;

                self.mapContainer = self.$refs['map'];

                const loader = new Loader({
                    apiKey: "AIzaSyBXNyRQZ_nINH9Zhxunu4BkyY6oJ1Tixpo",
                    version: "weekly"
                });
                loader.load()
                        .then(() => {
                            self.initMap()

                        });
                /**/
            },
            initMap() {
                var self = this;
                let m = new google.maps.Map(self.mapContainer, {
                    center: {lat: 56.86212047418092, lng: 53.22947384106101},
                    zoom: 12,
                });
                const marker = new google.maps.Marker({
                    position: {lat: 56.86212047418092, lng: 53.22947384106101},
                    map: m,
                });
            }
        },
        async fetch() {
        },
        mounted() {
            this.loadMap();
        },
    }
</script>

<style>
    .map {
        height: 500px;
    }
</style>
