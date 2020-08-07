<template>
    <div>
        <l-map :zoom="zoom" :center="center">
            <l-tile-layer :url="url"></l-tile-layer>
            <l-marker v-for="marker in markers" :lat-lng="marker.coords.split(',')" >
                <l-popup><b>{{ marker.name }}</b> <br> {{ marker.desc }}</l-popup>
            </l-marker>
        </l-map>
    </div>
</template>

<script>
    import { LMap, LTileLayer, LMarker, LPopup } from 'vue2-leaflet';

    export default {
        components: {
            LMap,
            LTileLayer,
            LMarker,
            LPopup
        },
        data () {
            return {
                url: 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
                zoom: 12,
                center: [50.45466, 30.5238],
                coords: null,
                markers: null
            };
        },
        mounted() {
            this.markers = JSON.parse(this._markers);
        },
        props: ['_markers']
    }
</script>
