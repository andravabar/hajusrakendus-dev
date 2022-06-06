<template>
  <div class="max-w-screen-lg w-full px-6 lg:mx-auto mt-12">
    <div class="flex flex-col w-full justify-center items-center">
        <h1 class="text-gray-500 text-2xl mb-6">New blog post</h1>
        <span v-if="form.wasSuccessful" class="text-green-500">Data saved</span>
      <form class="flex flex-col w-full  max-w-md gap-6" @submit.prevent="submit">
          <div class="flex flex-col">
              <label for="title">Title</label>
            <input class="rounded active:border-inherit" name="description" v-model="form.title" type="text" />
          </div>
          <div class="flex flex-col">
              <label for="description">Description</label>
            <textarea class="rounded" v-model="form.description" name="description"></textarea>
          </div>
          <button class="rounded w-full bg-gray-800 text-white font-bold uppercase px-2 py-1" type="submit">Submit</button>
      </form>
    </div>
  </div>
</template>

<script setup>
import { useForm } from "@inertiajs/inertia-vue3";
import { inject } from "@vue/runtime-core";

const route = inject("route");
const form = useForm({
  title: "",
  description: "",
});

const submit = () => {
  form.post(route("blog.add"), {
      onSuccess: () => form.reset()
  });
};
</script>
