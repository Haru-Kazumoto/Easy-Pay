<template>
    <div class="border border-[#00809D] transition hover:border-[#facc15] rounded-lg shadow-sm">
        <n-card hoverable :bordered="false">
            <div class="flex flex-col sm:flex-row justify-between mb-2">
                <div class="flex flex-1 flex-wrap items-center justify-between gap-3">
                    <span class="text-2xl font-bold text-green-600">Rp 160.000</span>

                    <span class="text-sm text-gray-500 mt-0">
                        Pada: 12 Desember 2023, 08:00 WIB
                    </span>
                </div>

            </div>

            <span class="text-sm md:text-lg">Pembayaran
                <span class="text-sm font-semibold">SPP Bulan Desember</span>
            </span>

            <div class="border-t border-gray-300 mt-4"></div>

            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <span class="text-sm">VIA</span>
    
                    <img src="images/icon-bni-payment.png" alt="" class="w-auto h-9">
                </div>

                <n-tag type="success" size="small" strong>LUNAS</n-tag>
            </div>
        </n-card>
    </div>
</template>

<script setup lang="ts">
import { NCard, NTag } from "naive-ui";
</script>