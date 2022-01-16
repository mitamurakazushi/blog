<template>
  <div>
    <GmapMap
      :center="center"
      :zoom="12"
      style="width:100%;  height: 400px;"
    >
      <GmapInfoWindow
        :options="infoOptions"
        :position="infoWindowPos"
        :opened="infoWinOpen"
        @closeclick="infoWinOpen=false"
      ></GmapInfoWindow>
      <GmapMarker
        :key="post.id"
        v-for="post in posts"
        :position="{lat: post.latitude, lng: post.longitude}"
        :icon="{
        url: post.iconurl,
        scaledSize: {width: 32, height: 36},
        }"
        :clickable="true"
        @click="toggleInfoWindow(post)"
      ></GmapMarker>
    </GmapMap>
  </div>
</template>
 
<script>
export default {
  props: ["posts"],
  name: "GoogleMap",
  data() {
    return {
      center: { lat: 35.605, lng: 139.683889 },
      currentPlace: null,
      infoOptions: {
        pixelOffset: {
          width: 0,
          height: -35
        },
        content: null
      },
      infoWindowPos: null,
      infoWinOpen: false,
    };
  },
  props: {
    posts: {
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
    },
    toggleInfoWindow(post) {
      this.infoWindowPos = {lat: post.latitude, lng: post.longitude};
      this.infoWinOpen = true;
      if(post.image){
        this.infoOptions.content = '<a href="/posts/' + post.id + '" style="font-size: 15pt;">' + post.title + '</a>' 
        + '<h3>' + post.body + '</h3>' + '<p>' + "category : " +  post.category + '</p>' + '<img src="' + post.image  + '" />';
      }
      else{
        this.infoOptions.content = '<a href="/posts/' + post.id + '" style="font-size: 15pt;">' + post.title + '</a>' 
        + '<h3>' + post.body + '</h3>' + '<p>' + "category : " +  post.category + '</p>';
      }
      
    }
  }
};
</script>