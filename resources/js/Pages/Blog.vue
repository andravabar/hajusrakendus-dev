<template>
  <div class="max-w-screen-lg w-full mx-auto mt-12">
    <h1 class="text-2xl text-gray-700 pb-6">Blog</h1>
    <Disclosure class="mb-4" as="div" v-for="(post, index) in posts" :key="index" v-slot="{ open }">
      <DisclosureButton
        class="
          flex
          flex-col
          justify-between
          w-full
          px-4
          py-2
          text-sm
          font-medium
          text-left
          bg-blue-100
          rounded-t-lg
          focus:outline-none
          focus-visible:ring
          focus-visible:ring-purple-500
          focus-visible:ring-opacity-75
        "
      >
        <div>
          <p class="text-lg">{{post.title}}</p>
        </div>
        <div class="w-full flex items-center justify-center">
        <ChevronDownIcon
          :class="open ? 'transform rotate-180' : ''"
          class="w-5 h-5"
        />
        </div>
      </DisclosureButton>
      <DisclosurePanel class="flex
          flex-col
          justify-between
          w-full
          px-4
          py-2
          text-left
          bg-blue-100
          rounded-b-lg">
        <p>{{post.description}}</p>
      </DisclosurePanel>
    </Disclosure>
  </div>
</template>

<script setup>
import { Disclosure, DisclosureButton, DisclosurePanel } from "@headlessui/vue";
import { ChevronDownIcon } from "@heroicons/vue/solid";

const props = defineProps({
  posts: {
    type: Array,
    default: null,
  },
});
</script>

