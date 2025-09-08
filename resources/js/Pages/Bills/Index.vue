<template>
    <AppLayout title="Daftar Tagihan">
        <HeaderBanner :breadcrumbs />

        <n-card class="my-3">
            <div class="flex flex-col gap-2">
                <div class="grid grid-cols-12 gap-3 my-3">
                    <!-- Bulan (hanya tampil di mobile) -->
                    <div class="col-span-12 sm:col-span-2 hidden sm:block">
                        <n-select placeholder="Bulan" clearable v-model:value="filterData.month" :options="months"/>
                    </div>

                    <!-- Tipe (hanya tampil di mobile) -->
                    <div class="col-span-12 sm:col-span-2 hidden sm:block">
                        <n-select placeholder="Tipe" multiple clearable v-model:value="filterData.type" :options="paymentTypes"/>
                    </div>

                    <!-- Input (selalu tampil) -->
                    <div class="col-span-8">
                        <n-input placeholder="Nama Tagihan" clearable v-model:value="filterData.name" />
                    </div>

                    <!-- Button Filter (desktop, ganti semua filter kecil) -->
                    <div class="block sm:hidden col-span-4">
                        <n-button type="primary" class="w-full">Filter</n-button>
                    </div>
                </div>

                <div class="flex flex-wrap items-center gap-2" v-if="hasFilter">
                    <span class="font-semibold">Filter:</span>
                    <n-tag v-if="filterData.month" type="info">Bulan: {{ filterData.month }}</n-tag>
                    <n-tag v-for="t in filterData.type" :key="t" type="success">Tipe: {{ t }}</n-tag>
                    <n-tag v-if="filterData.name" type="info">Nama: {{ filterData.name }}</n-tag>
                </div>

            </div>

            <n-divider></n-divider>

            <div class="flex flex-col gap-4">
                <template v-for="i in 10">
                    <BillsCard />
                </template>
            </div>
        </n-card>


    </AppLayout>
</template>

<script setup lang="ts">
import AppLayout from '@/Layouts/AppLayout.vue';
import HeaderBanner from '@/Components/HeaderBanner.vue';
import BillsCard from '@/Components/BillsCard.vue';
import { NSelect, NInput, NButton, NCard, NTag, NDivider } from 'naive-ui';
import { reactive, computed } from 'vue';

const breadcrumbs = [
    { label: "Daftar Tagihan", href: 'bills.index' },
]

const months = [
    { label: "JANUARI", value: "JANUARI" },
    { label: "FEBRUARI", value: "FEBRUARI" },
    { label: "MARET", value: "MARET" },
    { label: "APRIL", value: "APRIL" },
    { label: "MEI", value: "MEI" },
    { label: "JUNI", value: "JUNI" },
    { label: "JULI", value: "JULI" },
    { label: "AGUSTUS", value: "AGUSTUS" },
    { label: "SEPTEMBER", value: "SEPTEMBER" },
    { label: "OKTOBER", value: "OKTOBER" },
    { label: "NOVEMBER", value: "NOVEMBER" },
    { label: "DESEMBER", value: "DESEMBER" },
]

const paymentTypes = [
    { label: "SPP", value: "SPP" },
    { label: "Uang Buku", value: "BUKU" },
    { label: "Uang Seragam", value: "SERAGAM" },
    { label: "DSP / Uang Gedung", value: "DSP" },
    { label: "Kegiatan / Ekstrakurikuler", value: "KEGIATAN" },
    { label: "Ujian", value: "UJIAN" },
    { label: "Lainnya", value: "LAINNYA" },
]


const filterData = reactive({
    month: '',
    type: [],
    name: ''
});

const hasFilter = computed(() => {
    return (
        filterData.month !== '' ||
        filterData.type.length > 0 ||
        filterData.name !== ''
    )
})
</script>