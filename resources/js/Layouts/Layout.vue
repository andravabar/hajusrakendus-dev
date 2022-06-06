<template>
<div class="min-h-screen flex flex-col">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="bg-white">
        <!-- Primary Navigation Menu -->
            <div class="px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex space-x-8">
                        <div class="flex items-center">
                            <Link href="/ ">
                                <ApplicationLogo class="block h-9 w-auto" />
                            </Link>
                        </div>
                        <!-- Navigation Links -->
                        <div class="flex space-x-8">
                            <NavLink href="/map" >
                                Map
                            </NavLink>
                            <NavLink href="/weather" >
                                Weather
                            </NavLink>
                            <NavLink href="/blog">
                                Blog
                            </NavLink>
                            <NavLink href="/Ralfapi">
                                Ralf API
                            </NavLink>
                            <NavLink href="/Andruseapi">
                                Andruse API
                            </NavLink>

                            <NavLink href="/Andraapi">
                                Andra API
                            </NavLink>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <main class="font-sans antialiased flex flex-col flex-1">
        <slot></slot>
    </main>
</div>
</template>

<script setup>
import { inject, ref } from 'vue';
import { Link } from '@inertiajs/inertia-vue3';

const route = inject('route')
</script>