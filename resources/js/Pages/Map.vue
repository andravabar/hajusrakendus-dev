<template>
  <div class="w-full h-96">
    <div class="h-full w-full" id="map" ref="map"></div>
    <div class="grid grid-cols-2">
      <form class="flex flex-col w-72 gap-4 mt-4 mx-6" @submit.prevent="submit">
        <div class="grid grid-cols-2 bg-blue-200 py-4 px-4 rounded-lg">
          <p class="items-center flex">Name</p>
          <input type="text" name="name" v-model="form.name" class="rounded-lg" />
        </div>
        <div class="grid grid-cols-2 bg-blue-200 py-4 px-4 rounded-lg">
          <p class="items-center flex">Longitude</p>
          <input type="text" name="longitude" v-model="form.lng" class="rounded-lg"/>
        </div>
        <div class="grid grid-cols-2 bg-blue-200 py-4 px-4 rounded-lg">
          <p class="items-center flex">Latitude</p>
          <input type="text" name="latitude" v-model="form.lat" class="rounded-lg"/>
        </div>
        <div class="grid grid-cols-2 bg-blue-200 py-4 px-4 rounded-lg">
          <p class="items-center flex">Description</p>
          <input type="text" name="description" v-model="form.description" class="rounded-lg"/>
        </div>
        <input type="submit" class="bg-blue-200 rounded-lg py-4 px-4 font-bold" value="Add marker" />
      </form>
      <table>
        <tr v-for="item in data" :key="markers.id">
          <td>{{ item.name }}</td>
          <td>{{ item.description }}</td>
          <td>{{ item.latitude }}</td>
          <td>{{ item.latitude }}</td>
          <button @click="$emit('edit', item)" class="btn">Edit</button>
          <button @click="$emit('delete', item)" class="btn">Delete</button>
        </tr>
      </table>
    </div>
  </div>
</template>



<script setup>

    const form = useForm({
      name: "",
      lng: "",
      lat: "",
      description: "",
    });

import { Loader } from "@googlemaps/js-api-loader";
import { useForm } from "@inertiajs/inertia-vue3";
import { ref, inject } from "vue";

const route = inject('route');

// Kontrollerist saadetud andmed (props) !NB jälgi et sisse tuleva data "key" oleks markers.
const props = defineProps({
  markers: {
    type: Array,
    default: null,
  },
  data : JSON
});

let map = ref(null);
let prevMarker;

const loader = new Loader({
  apiKey: "",
  version: "weekly",
});

loader.load().then(() => {
  let myLatLng = { lat: 58.24806, lng: 22.50389 };
  map = new google.maps.Map(map.value, {
    zoom: 8,
    center: myLatLng,
  });
  for (const key in props.data) {
    let markers = new google.maps.Marker({
      position: {
        lat: props.data[key].latitude,
        lng: props.data[key].longitude,
      },
      label: props.data[key].name,
      map,
    });
  }
  new google.maps.Marker({
    position: myLatLng,
    map,
    title: "test",
  });

  map.addListener("click", (mapsMouseEvent) => {
    if (prevMarker) {
      prevMarker.setMap(null);
    }
    let data = mapsMouseEvent.latLng.toJSON();
    prevMarker = new google.maps.Marker({
      position: data,
    });
    form.lng = data.lng;
    form.lat = data.lat;
    addMarker(data, map);

    prevMarker.setMap(map);
  });
});
function addMarker(location, map) {
  new google.maps.Marker({
    position: location,
    label: form.name ? form.name : "",
    map: map,
  });
}
const submit = () => {
  form.post('/map')
}

</script>

