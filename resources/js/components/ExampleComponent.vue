<template>
    <div>
        <button @click="getPosition">位置情報取得</button>
        <p>緯度：{{ locations.latitude }}</p>
        <p>経度：{{ locations.longitude }}</p>
    </div>
</template>

<script>
export default {
    data: () => {
        return {
            locations: {
                latitude: null,
                longitude: null
            }
        }
    },
    methods: {
        getPosition: function() {
            /*global navigator*/
            navigator.geolocation.getCurrentPosition(
                function(position) {
                    this.locations.latitude = position.coords.latitude;
                    this.locations.longitude = position.coords.longitude;
                    console.log(this.locations.latitude,this.locations.longitude);
                }.bind(this)
            );
            /*global axios*/
            axios.post("/locations",{
                latitude: this.locations.latitude,
                longitude: this.locations.longitude
                }
            )
            .then(response => this.locations.unshift(response.data))
            .catch(error => console.log(error));
        }
    }
}
</script>