<template>

    <Head title="Log in" />

    <GuestLayout>

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
                    <span class="mt-2 mb-8 text-md leading-relaxed text-lg">
                        Pantau dan kelola tagihan mu dengan mudah, cepat, dan aman!
                    </span>

                    <n-alert title="Akun Salah" type="error" closable v-if="form.errors['email']">
                        Mohon cek akun kembali
                    </n-alert>

                    <n-form size="large" class="mt-8" ref="formRef" :rules="rules" :model="form">
                        <n-form-item label="Email" label-style="color: white; font-size: 16px;" path="email">
                            <n-input placeholder="Masukan email" v-model:value="form.email">
                                <template #prefix>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                                    </svg>
                                </template>
                            </n-input>
                        </n-form-item>
                        <n-form-item label="Password" label-style="color: white; font-size: 16px;" path="password">
                            <n-input placeholder="Masukan password" type="password" show-password-on="click"
                                v-model:value="form.password">
                                <template #prefix>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.75 5.25a3 3 0 0 1 3 3m3 0a6 6 0 0 1-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1 1 21.75 8.25Z" />
                                    </svg>

                                </template>
                            </n-input>
                        </n-form-item>
                        <div class="flex justify-between items-center">
                            <n-checkbox v-model:checked="form.remember">
                                <span class="text-white">Ingat Saya</span>
                            </n-checkbox>
                            <n-button type="warning" size="large" :loading="form.processing" :disabled="form.processing"
                                @click="submit">LOGIN</n-button>
                        </div>
                    </n-form>

                </div>
            </div>
        </div>

    </GuestLayout>

</template>

<script setup lang="ts">
import { Head, Link, useForm } from '@inertiajs/vue3';
import { NForm, NFormItem, NButton, NCheckbox, NInput, NAlert, FormRules, FormInst, GlobalThemeOverrides } from 'naive-ui';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { ref } from 'vue';

interface Login {
    email: string;
    password: string;
    remember: boolean;
}

defineProps({
    canResetPassword: Boolean,
    status: String,
    errors: String
});

const formRef = ref<FormInst | null>(null);
const form = useForm<Login>({
    email: '',
    password: '',
    remember: false,
});

const rules: FormRules = {
    email: { required: true, message: "Email harus diisi!", trigger: ['blur', 'change'] },
    password: { required: true, message: "Password harus diisi!", trigger: ['blur', 'change'] }
}

function submit(e: MouseEvent) {
    e.preventDefault();

    formRef.value.validate((errors) => {
        if (errors) return;

        form.transform(data => ({
            ...data,
            remember: form.remember ? 'on' : '',
        })).post(route('login'), {
            onFinish: () => form.reset('password')
        });
    })
};
</script>