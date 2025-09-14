<template>
    <AppLayout title="Detail Pembayaran">
        <HeaderBanner title="Detail Tagihan" :breadcrumbs="breadcrumbs" backRoute="bills.index" />

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

            <!-- Tombol Bayar -->
            <div class="flex flex-col sm:flex-col md:flex-row gap-2 justify-end">
                <n-button size="large" type="error">
                    <template #icon>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                    </template>
                    PENGAJUAN TIDAK BAYAR
                </n-button>

                <n-button type="primary" size="large" class="w-full sm:w-auto">
                    <template #icon>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.042 21.672 13.684 16.6m0 0-2.51 2.225.569-9.47 5.227 7.917-3.286-.672ZM12 2.25V4.5m5.834.166-1.591 1.591M20.25 10.5H18M7.757 14.743l-1.59 1.59M6 10.5H3.75m4.007-4.243-1.59-1.59" />
                        </svg>

                    </template>
                    BAYAR TAGIHAN INI
                </n-button>
            </div>
        </n-card>

        <n-card class="my-6 shadow-md rounded-xl">

            <div class="my-3" v-if="showAlert" @close="showAlert = false">
                <n-alert title="Success Text" type="success" closable>
                    Leave it till tomorrow to unpack my case
                </n-alert>
            </div>

            <!-- Header -->
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-4">
                <div class="flex gap-2">
                    <h2 class="text-lg font-semibold">Daftar Pembayaran</h2>
                    <n-tag type="info" strong round>BERANGSUR</n-tag>
                </div>
                <n-button type="primary" size="medium" class="mt-2 sm:mt-0" @click="showModal = true">
                    <template #icon>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>

                    </template>
                    Pembayaran Baru
                </n-button>
            </div>

            <!-- List pembayaran -->
            <div class="flex flex-col gap-4">
                <template v-for="i in 10">
                    <PaymentHistoryCard />
                </template>
            </div>
        </n-card>

        <n-modal v-model:show="showModal" style="position: fixed; top: 30px; left: 10px; right: 10px;"
            :mask-closable="false">
            <n-card :bordered="false" size="huge" preset="dialog" aria-modal="true"
                content-style="padding: 0; border-radius: 20px;"
                class="w-[350px] md:w-[500px] rounded-2xl overflow-hidden">
                <!-- custom header -->
                <div class="flex justify-between bg-[#00809D] p-3 items-center w-full h-16">
                    <span class="text-lg font-semibold text-white">Unggah Pembayaran Baru</span>
                </div>

                <!-- content modal -->
                <div class="p-4">
                    <n-form>
                        <!-- Jumlah Pembayaran -->
                        <n-form-item label="Jumlah Pembayaran" path="amount">
                            <n-input placeholder="Masukkan jumlah pembayaran" />
                        </n-form-item>

                        <!-- Tipe Pembayaran -->
                        <n-form-item label="Tipe Pembayaran" path="paymentType">
                            <n-select :options="[
                                { label: 'TUNAI', value: 'TUNAI' },
                                { label: 'TRANSFER', value: 'TRANSFER' }
                            ]" placeholder="Pilih tipe pembayaran" />
                        </n-form-item>

                        <!-- Kondisional jika TRANSFER -->
                        <div>
                            <!-- Select Bank -->
                            <n-form-item label="Bank" path="bank">
                                <n-select :options="[
                                    { label: 'BCA', value: 'BCA' },
                                    { label: 'Mandiri', value: 'MANDIRI' },
                                    { label: 'BNI', value: 'BNI' }
                                ]" placeholder="Pilih bank" />
                            </n-form-item>

                            <!-- Nama Pengirim -->
                            <n-form-item label="Nama Pengirim" path="senderName">
                                <n-input placeholder="Masukkan nama pengirim" />
                            </n-form-item>
                        </div>

                        <!-- Upload Bukti Pembayaran -->
                        <n-form-item label="Upload Bukti" path="receipt">
                            <n-upload :max="1" list-type="image-card" accept="image/*" />
                        </n-form-item>

                        <!-- Tombol aksi -->
                        <div class="flex justify-end gap-2 mt-4">
                            <n-button quaternary @click="showModal = false">Batal</n-button>
                            <n-button type="primary" @click="onSubmitPayment">Simpan</n-button>
                        </div>
                    </n-form>
                </div>
            </n-card>
        </n-modal>


    </AppLayout>
</template>

<script setup lang="ts">
import AppLayout from '@/Layouts/AppLayout.vue';
import HeaderBanner from '@/Components/HeaderBanner.vue';
import PaymentHistoryCard from '@/Components/PaymentHistoryCard.vue';
import { NCard, NButton, NTag, NImage, NModal, NInput, NForm, NFormItem, NUpload, NSelect, NAlert } from "naive-ui";
import { ref } from 'vue';

const props = defineProps({
    id: { type: Number, required: true }
});

const showModal = ref(false);
const showAlert = ref(false);

const breadcrumbs = [
    { label: "Daftar Tagihan", href: 'bills.index' },
    { label: "Detail Tagihan", href: 'bills.show', id: props.id }
]

function onSubmitPayment() {
    showAlert.value = true;
    showModal.value = false;

    // Auto close setelah 3 detik
    setTimeout(() => {
        showAlert.value = false;
    }, 3000);
}

</script>