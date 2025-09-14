<template>
    <Link :href="route(routeName, [id])" @click="loading = true"
        class="border border-[#00809D] transition hover:border-[#facc15] rounded-lg shadow-sm cursor-pointer">
    <n-spin :show="loading">
        <n-card hoverable :bordered="false">
            <div class="flex flex-col sm:flex-row justify-between mb-2">
                <div class="flex items-center gap-3">
                    <div class="p-2 bg-[#00809D] rounded-full flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                            class="size-4 text-white">
                            <path fill-rule="evenodd"
                                d="M5.75 2a.75.75 0 0 1 .75.75V4h7V2.75a.75.75 0 0 1 1.5 0V4h.25A2.75 2.75 0 0 1 18 6.75v8.5A2.75 2.75 0 0 1 15.25 18H4.75A2.75 2.75 0 0 1 2 15.25v-8.5A2.75 2.75 0 0 1 4.75 4H5V2.75A.75.75 0 0 1 5.75 2Zm-1 5.5c-.69 0-1.25.56-1.25 1.25v6.5c0 .69.56 1.25 1.25 1.25h10.5c.69 0 1.25-.56 1.25-1.25v-6.5c0-.69-.56-1.25-1.25-1.25H4.75Z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="flex flex-col md:flex-row md:items-center md:gap-2">
                        <span class="font-semibold text-lg">SPP Bulan Desember</span>
                        <div class="flex">
                            <n-tag type="info" size="small" round strong class="w-fit">SPP</n-tag>
                        </div>
                    </div>
                </div>

                <span class="text-sm text-gray-500 mt-2 sm:mt-0">
                    Jatuh Tempo: 10 Des 2025
                </span>
            </div>

            <p class="text-sm text-gray-600">Deskripsi pembayaran SPP bulan Desember.</p>
            <div class="flex justify-between items-center">
                <span class="text-lg font-bold text-green-600">Rp 160.000</span>
                <span class="text-sm text-gray-500">1 Hour Ago</span>
            </div>
        </n-card>
    </n-spin>
    </Link>
</template>

<script setup lang="ts">
import { NCard, NTag, NSpin } from "naive-ui";
import { Link } from "@inertiajs/vue3";
import { computed, ref } from "vue";

const emit = defineEmits<{ (e: "update:loading", value: boolean): void }>();

const props = defineProps({
    loading: { type: Boolean, required: false, default: false },
    routeName: { type: String, required: true },
    id: { type: Number, required: true }
});

const loading = computed({
    get: () => props.loading,
    set: (val) => emit("update:loading", val)
})
</script>