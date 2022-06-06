<template>
  <div class="flex justify-center items-center font-semibold gap-2" v-if="data">
      <img :src="weatherIcon" alt="" />
      <p>{{ data.name }}</p>
      <p><span class="font-normal">Temperature: </span>{{data.main.temp}}℃</p>
      <p><span class="font-normal">Feels like: </span>{{data.main.feels_like}}℃</p>
      <p><span class="font-normal">Description: </span>{{data.weather[0].description}}</p>
  </div>
</template> 

<script setup>
import { computed } from "@vue/runtime-core";

const props = defineProps({
  data: Object,
  default: null,
});

const weatherIcon = computed(
  () => `https://openweathermap.org/img/w/${props.data?.weather[0].icon}.png`
);
</script>
