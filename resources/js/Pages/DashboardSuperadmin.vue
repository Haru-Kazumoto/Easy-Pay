<template>
    <AppLayout title="Dashboard">
        <div class="flex flex-col gap-3 ">
            <Carousels />

            <!-- GREETINGS CARD -->
            <n-card class="shadow-md relative overflow-hidden " :style="{
                backgroundImage: `url('images/ornamen-3.svg')`,
                backgroundRepeat: 'no-repeat',
                backgroundPosition: 'center',
                backgroundSize: 'cover',
                backgroundColor: 'white',
            }">
                <!-- overlay putih transparan -->
                <div class="absolute inset-0 bg-white/50 pointer-events-none"></div>

                <div class="relative flex flex-col md:flex-row items-center gap-6 my-4">
                    <n-avatar :size="100" round src="https://07akioni.oss-cn-beijing.aliyuncs.com/07akioni.jpeg" />

                    <div class="flex flex-col gap-2 ">
                        <h1 class="text-2xl font-bold text-gray-800">
                            Selamat Datang, {{ auth.user.name }} !
                        </h1>
                        <span class="text-lg font-semibold text-gray-600">
                            Senang Melihatmu Kembali!
                        </span>
                    </div>

                    <div class="flex flex-1 justify-end gap-10">
                        <div class="flex flex-col gap-2 ">
                            <span class="text-lg text-white lg:text-gray-600">Sisa Tagihan</span>
                            <span class="text-3xl font-bold text-white lg:text-gray-800 text-center">2</span>
                        </div>
                        <div class="flex flex-col gap-2 ">
                            <span class="text-lg text-white lg:text-gray-600">Tagihan Terbayar</span>
                            <span class="text-3xl font-bold text-white lg:text-gray-800 text-center">2</span>
                        </div>
                    </div>
                </div>
            </n-card>

            <!-- MOBILE -->
            <div class="block md:hidden">
                <n-tabs type="segment" animated>
                    <n-tab-pane name="tagihan-terbaru" tab="Tagihan Terbaru">
                        <div class="col-span-1 md:col-span-3">
                            <n-card class="shadow-md">
                                <div class="flex items-center justify-between gap-3 mb-3">
                                    <div class="gap-3 flex items-center">
                                        <div class="p-1 bg-[#FEFBC7] rounded-full">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0M3.124 7.5A8.969 8.969 0 0 1 5.292 3m13.416 0a8.969 8.969 0 0 1 2.168 4.5" />
                                            </svg>
                                        </div>

                                        <span class="text-lg font-semibold">Tagihan Terbaru</span>
                                    </div>

                                    <n-button text type="primary">Semua Tagihan</n-button>
                                </div>

                                <div class="flex flex-col gap-4">
                                    <template v-for="i in 5">
                                        <BillsCard routeName="bills.show" :id="i" />
                                    </template>
                                </div>
                            </n-card>
                        </div>
                    </n-tab-pane>
                    <n-tab-pane name="riwayat-pembayaran" tab="Riwayat Pembayaran">
                        <div class="col-span-1 md:col-span-2">
                            <n-card class="shadow-md ">
                                <div class="flex items-center gap-3 mb-3">
                                    <div class="p-1 bg-[#FEFBC7] rounded-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>
                                    </div>

                                    <span class="text-lg font-semibold">Riwayat Pembayaran Terakhir</span>
                                </div>

                                <n-list clickable>
                                    <n-list-item v-for="i in 3" :key="i" class="mb-3">
                                        <PaymentHistoryCard />
                                    </n-list-item>
                                </n-list>

                            </n-card>
                        </div>
                    </n-tab-pane>
                </n-tabs>
            </div>

            <!-- DESKTOP -->
            <div class="hidden md:block">
                <div class="grid grid-cols-1 md:grid-cols-5 gap-3">
                    <div class="col-span-1 md:col-span-3">
                        <n-card class="shadow-md">
                            <div class="flex items-center justify-between gap-3 mb-3">
                                <div class="gap-3 flex items-center">
                                    <div class="p-1 bg-[#FEFBC7] rounded-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0M3.124 7.5A8.969 8.969 0 0 1 5.292 3m13.416 0a8.969 8.969 0 0 1 2.168 4.5" />
                                        </svg>
                                    </div>

                                    <span class="text-lg font-semibold">Tagihan Terbaru</span>
                                </div>

                                <n-button text type="primary">Semua Tagihan</n-button>
                            </div>

                            <div class="flex flex-col gap-4">
                                <template v-for="i in 5">
                                    <BillsCard routeName="bills.show" :id="i" />
                                </template>
                            </div>
                        </n-card>
                    </div>
                    <div class="col-span-1 md:col-span-2">
                        <n-card class="shadow-md ">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="p-1 bg-[#FEFBC7] rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                </div>

                                <span class="text-lg font-semibold">Riwayat Pembayaran Terakhir</span>
                            </div>

                            <n-list clickable>
                                <n-list-item v-for="i in 3" :key="i" class="mb-3">
                                    <PaymentHistoryCard :id="i" />
                                </n-list-item>
                            </n-list>

                        </n-card>
                    </div>
                </div>
            </div>

        </div>
    </AppLayout>
</template>

<script setup lang="ts">
import { PropType, reactive } from "vue";
import { Auth } from "./types/global";
import ShortcutButton from '@/Components/ShortcutButton.vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import BillsCard from "@/Components/BillsCard.vue";
import PaymentHistoryCard from "@/Components/PaymentHistoryCard.vue";
import Carousels from "@/Components/Carousels.vue";
import { NCarousel, NCard, NAvatar, NList, NListItem, NTabs, NTabPane, NButton } from "naive-ui";

defineProps({
    auth: Object as PropType<Auth>
});

</script>