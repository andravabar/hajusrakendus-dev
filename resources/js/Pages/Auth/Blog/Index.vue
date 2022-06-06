<template>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="flex justify-end py-4">
        <Link class="bg-gray-800 text-white font-bold text-sm uppercase px-2 py-1 rounded" :href="route('blog.add')">Add new</Link>
      </div>
      <div class="bg-white overflow-hidden sm:rounded-lg">
        <div 
        class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg">
          <table class="min-w-full">
            <thead>
              <tr class="bg-gray-50">
                <th class="px-6 py-3">ID</th>
                <th class="px-6 py-3">Title</th>
                <th class="px-6 py-3">Description</th>
                <th class="px-6 py-3">Options</th>
              </tr>
            </thead>
            <tbody class="bg-white" v-for="(post, index) in posts" :key="index">
              <tr class="">
                <td class="px-6 py-4 flex justify-center">
                  <div class="leading-5 font-medium text-gray-900">{{post.id}}</div>
                </td>
                <td class="px-6 py-4 ">
                  <p class="flex justify-center">{{post.title}}</p>
                </td>
                <td class="px-6 py-4">
                  <p class="flex justify-center">{{post.description}}</p>
                </td>
                <td class="px-6 py-4 text-right  text-sm leading-5 font-medium">
                  <div class="flex gap-4 justify-center">
                    <Link class="bg-gray-800 text-white font-bold text-sm uppercase px-2 py-1 rounded" :href="route('blog.edit', post.id)">Edit</Link>
                    <Link class="bg-red-500 bg-opacity-80 text-white font-bold text-sm uppercase px-2 py-1 rounded" as="button" method="post" :href="route('blog.delete', post.id)">Delete</Link>
                  </div>
                </td>
              </tr>            
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

</template>
<script>
import { inject } from '@vue/runtime-core';
import { Link } from '@inertiajs/inertia-vue3';
export default { layoutName: "Authenticated" };
</script>
<script setup>
const route = inject('route')
const props = defineProps({
posts: {
type: Array,
default: null
}
})

</script>