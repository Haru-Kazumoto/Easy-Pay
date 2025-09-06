<template>
    <button class="flex flex-col items-center justify-start w-24 h-24 bg-gradient-to-br from-cyan-500 to-blue-600 
           rounded-xl shadow-md hover:shadow-xl hover:scale-105 transition-all duration-300 ease-out p-2">
        <!-- Icon (paksa di atas dengan tinggi tetap) -->
        <div class="h-10 flex items-start justify-center">
            <slot name="icon"></slot>
        </div>

        <!-- Label -->
        <span class="text-white font-semibold text-sm mt-2 text-center">{{ label }}</span>
    </button>
</template>


<script setup lang="ts">
defineProps({
    label: String
});
</script>