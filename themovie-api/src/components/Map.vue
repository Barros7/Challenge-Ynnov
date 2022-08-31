<template>
  <div>
      <GMapMap
      :center="center"
        :zoom="7"
        map-type-id="terrain"
        style="width: 50%; height: 300px"
        >
      <GMapCluster>
        <GMapMarker
        :key="index"
        v-for="(m, index) in markers"
            :position="m.position"
            :clickable="true"
            :draggable="true"
            @click="center=m.position"
            />
          </GMapCluster>
        </GMapMap>
      </div>
  </template>
<script>
  export default {
    name: 'GoogleMap',
    data() {
      return {
        center: {lat: 51.093048, lng: 6.842120},
        markers: [
          {
          position: {
            lat: 51.093048, lng: 6.842120
          },
        },
      ]
    }
  }
}
</script>