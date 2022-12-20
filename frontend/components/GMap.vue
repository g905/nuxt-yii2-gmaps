<template>
  <div class="row">
    <div class="col-3">
      <div class="points mb-3">
        <form>
          <div class="row mb-2">
            <div class="col-6">
              <div class="d-flex flex-nowrap">
                <label for="lat" class="col-form-label me-2">lat: </label>
                <input type="number" id="lat" step="0.001" class="form-control form-control-sm" v-model="lat">
              </div>
            </div>
            <div class="col-6">
              <div class="d-flex flex-nowrap">
                <label for="lng" class="col-form-label me-2">lng: </label>
                <input type="number" id="lng" step="0.001" class="form-control form-control-sm" v-model="lon">
              </div>
            </div>
            <div class="col-2"></div>
          </div>
          <button type="submit" class="btn btn-info" @click="addPoint">Добавить</button>
        </form>
      </div>
      <div class="mb-2">
        <table class="table table-info">
            <tr v-for="marker in markers">
              <td>{{ marker.title }} </td><td> {{ marker.position.lat() }} </td><td> {{ marker.position.lng() }} </td>
            </tr>
        </table>
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
                el.setTitle('marker ' + parseInt(idx + 1));
                el.setMap(this.m);
              });
            },
            loadMap(el) {
                var self = this;
                const config = useRuntimeConfig();

                self.mapContainer = self.$refs['map'];

                const loader = new Loader({
                    apiKey: config.public.gmapsApiKey,
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
