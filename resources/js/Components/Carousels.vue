<template>
    <n-carousel autoplay draggable show-arrow :slides-per-view="1" dot-type="line"
        class="rounded-xl overflow-hidden shadow-md">
        <div v-for="i in 4" :key="i" class="w-full h-60 sm:h-64 md:h-72 bg-cover bg-center flex items-end p-4 sm:p-6"
            :style="{ backgroundImage: `url(images/slide-${i}.png)` }">
            <div class="bg-white bg-opacity-80 p-3 sm:p-4 rounded shadow w-full max-w-lg">
                <h2 class="text-lg sm:text-xl font-semibold text-gray-800">Title</h2>
                <p class="text-gray-600 text-sm">Deskripsi</p>
            </div>
        </div>
    </n-carousel>
</template>

<script setup lang="ts">
import { NCarousel } from 'naive-ui';
</script>