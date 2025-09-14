<template>
    <AppLayout title="Detail Pembayaran">
        <HeaderBanner title="Detail Pembayaran" backRoute="payments.history" />

        <n-card class="my-4 shadow-md rounded-xl overflow-hidden">
            <!-- Header -->
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-4">
                <div class="flex items-center gap-3">
                    <div class="bg-yellow-400 p-3 rounded-full flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="size-8 text-white">
                            <path fill-rule="evenodd"
                                d="M6.75 2.25A.75.75 0 0 1 7.5 3v1.5h9V3A.75.75 0 0 1 18 3v1.5h.75a3 3 0 0 1 3 3v11.25a3 3 0 0 1-3 3H5.25a3 3 0 0 1-3-3V7.5a3 3 0 0 1 3-3H6V3a.75.75 0 0 1 .75-.75Zm13.5 9a1.5 1.5 0 0 0-1.5-1.5H5.25a1.5 1.5 0 0 0-1.5 1.5v7.5a1.5 1.5 0 0 0 1.5 1.5h13.5a1.5 1.5 0 0 0 1.5-1.5v-7.5Z"
                                clip-rule="evenodd" />
                        </svg>

                    </div>
                    <div class="flex flex-col">
                        <span class="text-xl font-bold">SPP Bulan Desember</span>
                        <span class="text-sm text-gray-500">Diposting pada 2 Oktober 19:20</span>
                    </div>
                </div>
                <n-tag type="info" round size="medium" class="w-fit">SPP BULANAN</n-tag>
            </div>

            <!-- Deskripsi -->
            <p class="text-gray-600 mb-4">
                Pembayaran SPP bulan Desember untuk siswa kelas XI IPA 2.
                Silakan lakukan pembayaran sebelum jatuh tempo.
            </p>

            <!-- Detail Harga -->
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between bg-gray-100 p-4 rounded-lg mb-4">
                <div class="flex flex-col">
                    <span class="text-sm text-gray-500">Jumlah Tagihan</span>
                    <span class="text-2xl font-bold text-green-600">Rp 160.000</span>
                </div>
                <div class="mt-3 sm:mt-0">
                    <span class="text-sm text-gray-500">Jatuh Tempo: </span>
                    <span class="font-semibold text-red-500">10 Desember 2025</span>
                </div>
            </div>
        </n-card>

        <n-card class="my-6 shadow-md rounded-xl">
            <PaymentHistoryCard />
        </n-card>

        <n-modal v-model:show="showModal" style="position: fixed; top: 30px; left: 10px; right: 10px;">
            <n-card title="Okay" :bordered="false" size="huge" preset="dialog" aria-modal="true"
                class="w-[350px] md:w-[500px]" :mask-closable="false">
                Fine
                <template #footer>
                    Nice
                </template>
            </n-card>
        </n-modal>

    </AppLayout>
</template>

<script setup lang="ts">
import AppLayout from '@/Layouts/AppLayout.vue';
import HeaderBanner from '@/Components/HeaderBanner.vue';
import PaymentHistoryCard from '@/Components/PaymentHistoryCard.vue';
import { NCard, NButton, NTag, NImage, NModal } from "naive-ui";
import { ref } from 'vue';

const props = defineProps({
    id: { type: Number, required: true }
});

const showModal = ref(false);

const breadcrumbs = [
    { label: "Daftar Tagihan", href: 'bills.index' },
    { label: "Detail Tagihan", href: 'bills.show', id: props.id }
]

</script>