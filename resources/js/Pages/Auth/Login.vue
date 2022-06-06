<template>
  <Head title="Log in" />

  <ValidationErrors class="mb-4" />

  <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
    {{ status }}
  </div>

  <form @submit.prevent="submit">
    <div>
      <Label for="email" value="Email" />
      <Input
        id="email"
        type="email"
        class="mt-1 block w-full"
        v-model="form.email"
        required
        autofocus
        autocomplete="username"
      />
    </div>

    <div class="mt-4">
      <Label for="password" value="Password" />
      <Input
        id="password"
        type="password"
        class="mt-1 block w-full"
        v-model="form.password"
        required
        autocomplete="current-password"
      />
    </div>

    <div class="block mt-4">
      <label class="flex items-center">
        <Checkbox name="remember" v-model:checked="form.remember" />
        <span class="ml-2 text-sm text-gray-600">Remember me</span>
      </label>
    </div>

    <div class="flex items-center justify-end mt-4">
      <Link
        v-if="canResetPassword"
        :href="route('password.request')"
        class="underline text-sm text-gray-600 hover:text-gray-900"
      >
        Forgot your password?
      </Link>

      <Button
        class="ml-4"
        :class="{ 'opacity-25': form.processing }"
        :disabled="form.processing"
      >
        Log in
      </Button>
    </div>
  </form>
</template>

<script>
export default { layoutName: "Guest" };
</script>

<script setup>
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import { inject } from "@vue/runtime-core";

const route = inject("route");
defineProps({
  canResetPassword: Boolean,
  status: String,
});

const form = useForm({
  email: "",
  password: "",
  remember: false,
});

const submit = () => {
  form.post(route("login"), {
    onFinish: () => form.reset("password"),
  });
};
</script>
