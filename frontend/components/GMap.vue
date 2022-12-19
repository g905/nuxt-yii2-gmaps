<template>
  <div class="row">
    <div class="col-3">
      <div class="points">
        <form>
          <div class="flex mb-2">
            <input type="number" step="0.001" v-model="lat" class="w-25 me-2">
            <input type="number" step="0.001" v-model="lon" class="w-25">
          </div>
          <button type="submit" @click="addPoint">add</button>
        </form>
      </div>
      <div v-for="marker in markers">
        {{ marker.title }} : {{ marker.position.lat() }} : {{ marker.position.lng() }}
        </div>
    </div>
    <div class="col-9">
      <div class="map" ref="map"></div>
    </div>
  </div>

</template>

<script>
    import { Loader } from "@googlemaps/js-api-loader"
    import { MarkerClusterer } from "@googlemaps/markerclusterer"
    export default {
        data() {
            return {
                name: "Google maps component",
                mapContainer: null,
                m: null,
                markers: [],
                lat: 56.862,
                lon: 53.229
            }
        },
        methods: {
            addPoint(e) {
              let self = this;
              e.preventDefault();
              const marker = new google.maps.Marker({
                position: { lat: this.lat, lng: this.lon},
              });
              this.markers.push(marker);
              this.drawMarkers();
            },
            drawMarkers() {
              this.markers.forEach((el, idx) => {
                el.setTitle('"marker ' + parseInt(idx + 1) + '"');
                el.setMap(this.m);
              });
            },
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
                this.m = new google.maps.Map(self.mapContainer, {
                    center: {lat: 56.86212047418092, lng: 53.22947384106101},
                    zoom: 12,
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
