<template>
    <BaseLayout>
        <Head :title="title" />

        <Header @showModalLogout="showModalLogout = true" />

        <div class="w-full mt-3 min-h-screen max-w-6xl mx-auto px-4 md:px-0">
            <slot />
        </div>

        <footer class="mt-20 bg-gray-800">
            <div class="w-full mx-auto max-w-screen-xl p-4 md:flex md:items-center md:justify-between ">
                <span class="text-sm sm:text-center text-gray-400">© 2023 <a href="#"
                        class="hover:underline">CreativeDigital™</a>. All Rights Reserved.
                </span>
                <ul class="flex flex-wrap items-center mt-3 text-sm font-medium text-gray-400 sm:mt-0">
                    <li>
                        <a href="#" class="hover:underline me-4 md:me-6">About</a>
                    </li>
                    <li>
                        <a href="#" class="hover:underline me-4 md:me-6">Privacy Policy</a>
                    </li>
                    <li>
                        <a href="#" class="hover:underline me-4 md:me-6">Licensing</a>
                    </li>
                    <li>
                        <a href="#" class="hover:underline">Contact</a>
                    </li>
                </ul>
            </div>
        </footer>
    </BaseLayout>
</template>

<script setup lang="ts">
import BaseLayout from './BaseLayout.vue';
import Header from '@/Components/Header.vue';
import { Head, router } from '@inertiajs/vue3';
import { ref, watch } from 'vue';

defineProps({
    title: String,
});

const showModalLogout = ref(false);

watch(showModalLogout, (val) => {
    console.log("showModalLogout berubah jadi:", val);
});

function handleLogout() {
    router.post(route('logout'));
}

function handleCancel() {
    showModalLogout.value = false;
}
</script>