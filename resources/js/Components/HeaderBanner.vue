<template>
    <n-card class="bg-[#00809D]">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between text-white">
            <!-- Judul -->
            <span class="text-2xl font-semibold">Daftar Tagihan</span>

            <!-- Breadcrumb -->
            <n-breadcrumb separator=">" class="mt-2 md:mt-0" >
                <template v-for="data, index in breadcrumbs" :key="index">
                    <n-breadcrumb-item :href="route(data.href)">{{ data.label }}</n-breadcrumb-item>
                </template>
            </n-breadcrumb>
        </div>
    </n-card>

</template>

<script setup lang="ts">
import { NCard, NBreadcrumb, NBreadcrumbItem } from 'naive-ui';
import { PropType } from "vue";

type BreadcrumbLinks = {
    label: string;
    href: string;
}

defineProps({
    breadcrumbs: { type: Array as PropType<BreadcrumbLinks[]>, required: true }
});
</script>