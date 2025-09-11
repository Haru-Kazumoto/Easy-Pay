<template>
    <AppLayout title="Detail Pembayaran">
        <HeaderBanner title="Detail Tagihan" :breadcrumbs="breadcrumbs" backRoute="bills.index"/>

        <n-card class="my-3">
            <span class="text-lg">halo</span>
        </n-card>
    </AppLayout>
</template>

<script setup lang="ts">
import AppLayout from '@/Layouts/AppLayout.vue';
import HeaderBanner from '@/Components/HeaderBanner.vue';
import { NCard } from "naive-ui";

const props = defineProps({
    id: { type: Number, required: true }
});

const breadcrumbs = [
    { label: "Daftar Tagihan", href: 'bills.index' },
    { label: "Detail Tagihan", href: 'bills.show', id: props.id }
]

</script>