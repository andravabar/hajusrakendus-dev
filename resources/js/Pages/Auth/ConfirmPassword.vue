<template>
  <Head title="Confirm Password" />

  <div class="mb-4 text-sm text-gray-600">
    This is a secure area of the application. Please confirm your password
    before continuing.
  </div>

  <ValidationErrors class="mb-4" />

  <form @submit.prevent="submit">
    <div>
      <Label for="password" value="Password" />
      <Input
        id="password"
        type="password"
        class="mt-1 block w-full"
        v-model="form.password"
        required
        autocomplete="current-password"
        autofocus
      />
    </div>

    <div class="flex justify-end mt-4">
      <Button
        class="ml-4"
        :class="{ 'opacity-25': form.processing }"
        :disabled="form.processing"
      >
        Confirm
      </Button>
    </div>
  </form>
</template>

<script>
export default { layoutName: "Guest" };
</script>

<script setup>
import { Head, useForm } from "@inertiajs/inertia-vue3";
import { inject } from "@vue/runtime-core";

const route = inject("route");
const form = useForm({
  password: "",
});

const submit = () => {
  form.post(route("password.confirm"), {
    onFinish: () => form.reset(),
  });
};
</script>
