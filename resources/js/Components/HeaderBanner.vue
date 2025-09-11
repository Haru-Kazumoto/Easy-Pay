<template>
    <n-card class="bg-[#00809D] ">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between text-white">
            <!-- Judul -->
            <span class="text-2xl font-semibold">{{ title }}</span>

            <!-- Breadcrumb -->
            <n-breadcrumb separator=">" class="mt-2 md:mt-0">
                <template v-for="data, index in breadcrumbs" :key="index">
                    <n-breadcrumb-item :href="data.id ? route(data.href, [data.id]) : route(data.href)">{{ data.label
                    }}</n-breadcrumb-item>
                </template>
            </n-breadcrumb>
        </div>

        <n-button v-if="backRoute" class="mt-3" color="white" dashed @click="goBack">
            <template #icon>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m18.75 4.5-7.5 7.5 7.5 7.5m-6-15L5.25 12l7.5 7.5" />
                </svg>

            </template>
            Kembali
        </n-button>
    </n-card>
</template>

<script setup lang="ts">
import { NCard, NBreadcrumb, NBreadcrumbItem, NButton } from 'naive-ui';
import { PropType } from "vue";
import { router } from '@inertiajs/vue3';

type BreadcrumbLinks = {
    label: string;
    href: string;
    id?: number;
}

const props = defineProps({
    breadcrumbs: { type: Array as PropType<BreadcrumbLinks[]>, required: true },
    title: { type: String, required: true, default: "Default Title" },
    backRoute: { type: String, required: false }
});

function parseBackRoute(backRoute: string): { href: string, id: number | null } {
    const parts = backRoute.split(',').map(str => str.trim());

    return {
        href: parts[0],
        id: parts[1] ? Number(parts[1]) : null
    }
}

function goBack() {
    const { href, id } = parseBackRoute(props.backRoute);

    if(id) {
        router.visit(route(href, [id]));
    } else {
        router.visit(route(href));
    }
}
</script>