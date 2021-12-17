<template>
    <div class="row justify-content-center">
    <gmap-map
      :center="center"
      :zoom="12"
      style="width:100%;  height: 400px;"
    >
      <gmap-marker
        :key="location.id"
        v-for="location in locations"
        :position="{lat: location.latitude, lng: location.longitude}"
        @click="center={lat: location.latitude, lng: location.longitude}"
      ></gmap-marker>
    </gmap-map>
    </div>
</template>
 
<script>
export default {
  props: ["locations"],
  name: "GoogleMap",
  data() {
    return {
      center: { lat: 0, lng: 0 },
      currentPlace: null
    };
  },
  props: {
    locations: {
      required: true
    }
  },
 
 /*初期中心位置を現在地に*/
  mounted() {
    this.geolocate();
  },
 
  methods: {
    setPlace(place) {
      this.currentPlace = place;
    },
    geolocate: function() {
        /*global navigator*/
        navigator.geolocation.getCurrentPosition(position => {
          this.center = {
            lat: position.coords.latitude,
            lng: position.coords.longitude
          };
        });
    }
  }
};
</script>