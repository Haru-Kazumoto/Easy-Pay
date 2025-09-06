<template>
    <div class="min-h-screen grid grid-cols-1 md:grid-cols-3">
        <!-- Kiri: Ornamen -->
        <div class="hidden md:flex flex-col items-center justify-center space-y-8 p-8 bg-white">
            <img src="/images/ornamen-2.png" alt="Ornament 2" class="max-w-sm w-full object-contain -rotate-12" />
            <img src="/images/ornamen-1.png" alt="Ornament 1" class="max-w-xs w-full object-contain -rotate-12" />
        </div>

        <!-- Kanan: Form -->
        <div class="flex items-center justify-center bg-[#00809D] p-8 sm:col-span-2">
            <div class="w-full max-w-sm text-white">
                <h1 class="text-4xl font-bold">
                    Easy<span class="text-yellow-400">Pay</span>
                </h1>
                <p class="mt-2 mb-8 text-md leading-relaxed">
                    Pantau dan kelola tagihan mu dengan mudah, cepat, dan aman!
                </p>


            </div>
        </div>
    </div>
</template>



<script lang="ts">
import { NForm } from 'naive-ui';
import { reactive, ref } from 'vue'
import { defineComponent } from 'vue'

interface Login {
    username: string
    password: string
}

export default defineComponent({
    components: {
        NForm
    },
    setup() {
        const form = ref<Login>({
            username: '',
            password: ''
        })

        return {
            form
        }
    }
})
</script>

<style scoped></style>