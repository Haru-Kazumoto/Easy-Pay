<template>
    <AppLayout title="Riwayat Pembayaran">
        <HeaderBanner title="Riwayat Pembayaran" />


        <n-card class="my-3">
            <div class="flex flex-col gap-2">
                <div class="grid grid-cols-12 gap-3 my-3">

                    <div class="col-span-12 ">
                        <n-input-group>
                            <n-select placeholder="Filter Data" clearable v-model:value="filterData.month"
                                :options="months" :style="{ width: '40%' }" :consistent-menu-width="false" />
                            <n-input placeholder="Nama Tagihan" clearable v-model:value="filterData.name" />
                        </n-input-group>
                    </div>
                </div>

            </div>

            <n-divider></n-divider>

            <div class="flex flex-col gap-4">
                <template v-for="i in 10">
                    <PaymentHistoryCard :id="i" v-model:loading="loadingMap[i]"/>
                </template>

                <div class="flex justify-between items-center">
                    <span class="text-sm text-muted">100 data</span>
                    <n-pagination :page-count="1000" :simple="isSimple"></n-pagination>
                </div>
            </div>
        </n-card>
    </AppLayout>
</template>

<script setup lang="ts">
import AppLayout from '@/Layouts/AppLayout.vue';
import HeaderBanner from '@/Components/HeaderBanner.vue';
import PaymentHistoryCard from '@/Components/PaymentHistoryCard.vue';
import { NSelect, NInput, NCard, NDivider, NPagination, NSpin, NInputGroup } from 'naive-ui';
import { reactive, computed, onMounted, ref, onBeforeUnmount } from 'vue';

const isSimple = ref(false);
const loadingMap = ref<{ [key: number]: boolean }>({});

// const breadcrumbs = [
//     { label: "Daftar Tagihan", href: 'bills.index' },
// ]

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
    month: null as string,
    type: [],
    name: null as string
});

const hasFilter = computed(() => {
    return (
        filterData.month !== '' ||
        filterData.type.length > 0 ||
        filterData.name !== ''
    )
})

function checkDevice() {
    if (window.innerWidth <= 768) {
        isSimple.value = true;
    } else {
        isSimple.value = false;
    }
}

onMounted(() => {
    checkDevice()
    window.addEventListener("resize", checkDevice)
})

onBeforeUnmount(() => {
    window.removeEventListener("resize", checkDevice)
})
</script>