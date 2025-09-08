<template>
    <AppLayout title="Dashboard">
        <div class="flex flex-col gap-3 ">
            <Carousels />

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

            <div class="flex flex-wrap justify-center gap-4">
                <ShortcutButton label="Semua Tagihan" class="bg-[#00809D]">
                    <template #icon>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-8 h-8 text-white">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z" />
                        </svg>
                    </template>
                </ShortcutButton>
                <ShortcutButton label="Jadwal Tagihan" class="bg-[#00809D]">
                    <template #icon>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-8 h-8 text-white">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0M3.124 7.5A8.969 8.969 0 0 1 5.292 3m13.416 0a8.969 8.969 0 0 1 2.168 4.5" />
                        </svg>
                    </template>
                </ShortcutButton>
                <ShortcutButton label="Tagihan Saya" class="bg-[#00809D]">
                    <template #icon>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-8 h-8 text-white">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M11.35 3.836c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m8.9-4.414c.376.023.75.05 1.124.08 1.131.094 1.976 1.057 1.976 2.192V16.5A2.25 2.25 0 0 1 18 18.75h-2.25m-7.5-10.5H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V18.75m-7.5-10.5h6.375c.621 0 1.125.504 1.125 1.125v9.375m-8.25-3 1.5 1.5 3-3.75" />
                        </svg>
                    </template>
                </ShortcutButton>
                <ShortcutButton label="Riwayat Pembayaran" class="bg-[#00809D]">
                    <template #icon>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-8 h-8 text-white">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" />
                        </svg>
                    </template>
                </ShortcutButton>
            </div>

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

                                <n-list clickable v-for="i in 5" :key="i">
                                    <n-list-item class="flex justify-between items-center">
                                        <BillsCard />
                                    </n-list-item>
                                    <n-list-item v-if="i >= 5">
                                        <div class="flex items-center justify-center">
                                            <n-button text type="primary" size="large">LIHAT SELENGKAPNYA</n-button>
                                        </div>
                                    </n-list-item>
                                </n-list>
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

                            <n-list clickable v-for="i in 5" :key="i">
                                <n-list-item class="flex justify-between items-center">
                                    <BillsCard />
                                </n-list-item>
                                <n-list-item v-if="i >= 5">
                                    <div class="flex items-center justify-center">
                                        <n-button text type="primary" size="large">LIHAT SELENGKAPNYA</n-button>
                                    </div>
                                </n-list-item>
                            </n-list>
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
                                    <PaymentHistoryCard />
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