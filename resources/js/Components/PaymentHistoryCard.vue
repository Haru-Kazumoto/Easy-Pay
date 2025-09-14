<template>
    <component :is="id ? Link : 'div'" v-bind="id ? { href: route('payments.show', [id]) } : {}">
        <n-spin :show="loading">
            <n-card :bordered="false" hoverable
                class="border border-[#00809D] transition hover:border-[#facc15] rounded-lg shadow-sm">
                <div class="flex flex-col gap-4 w-full">
                    <!-- Header -->
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between w-full">
                        <span class="text-md font-semibold">Payment No: #INV-20250913-01</span>
                        <span class="text-sm text-gray-500">12 September 2025</span>
                    </div>

                    <!-- Jumlah + Bukti -->
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                        <!-- Jumlah -->
                        <div>
                            <span class="text-sm text-gray-500">Jumlah Pembayaran:</span>
                            <div class="text-xl font-bold text-green-600">Rp 500.000</div>
                        </div>

                        <!-- Bukti Pembayaran -->
                        <n-image v-if="true" width="50"
                            src="https://img.freepik.com/free-vector/realistic-receipt-template_23-2147938550.jpg"
                            class="rounded-md" />
                    </div>

                    <!-- Detail -->
                    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4">
                        <!-- Tagihan -->
                        <div class="flex flex-col">
                            <span class="text-sm text-gray-500">Tagihan:</span>
                            <span class="text-md font-semibold">SPP Bulan September</span>
                        </div>

                        <!-- Metode Pembayaran -->
                        <div class="flex flex-col">
                            <span class="text-sm text-gray-500">Metode Pembayaran:</span>
                            <div class="flex items-center gap-2">
                                <img src="/images/icon-btn-payment.png" alt="Bank btn" class="w-6 h-6" />
                                <span class="text-md">Bank Transfer (btn)</span>
                            </div>
                        </div>

                        <!-- Status -->
                        <div class="flex flex-col">
                            <span class="text-sm text-gray-500">Status Pengecekan:</span>
                            <n-tag type="info" class="w-fit" round>APPROVED</n-tag>
                        </div>
                    </div>
                </div>
            </n-card>
        </n-spin>
    </component>
</template>


<script setup lang="ts">
import { NCard, NTag, NImage, NSpin } from "naive-ui";
import { Link } from '@inertiajs/vue3';
import { computed } from "vue";

const emit = defineEmits<{ (e: "update:loading", value: boolean): void }>();

const props = defineProps({
    id: { type: Number, required: false },
    loading: { type: Boolean, required: false, default: false }
});

const loading = computed({
    get: () => props.loading,
    set: (val) => emit("update:loading", val)
})
</script>