<template>

    <Head title="Log in" />

    <BaseLayout>

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
                        Easy<span class="text-yellow-400">Pay | ADMIN</span>
                    </h1>
                    <span class="mt-2 mb-8 text-md leading-relaxed text-lg">
                        Pantau dan kelola tagihan mu dengan mudah, cepat, dan aman!
                    </span>

                    <!-- <n-alert title="Akun Salah" type="error" closable>
                        Mohon cek akun kembali
                    </n-alert> -->

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

        <!-- <AuthenticationCard>
            <template #logo>
                <AuthenticationCardLogo />
            </template>

            <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
                {{ status }}
            </div>



            <form @submit.prevent="submit">
                <div>
                    <InputLabel for="email" value="Email" />
                    <TextInput id="email" v-model="form.email" type="email" class="mt-1 block w-full" required autofocus
                        autocomplete="username" />
                    <InputError class="mt-2" :message="form.errors.email" />
                </div>

                <div class="mt-4">
                    <InputLabel for="password" value="Password" />
                    <TextInput id="password" v-model="form.password" type="password" class="mt-1 block w-full" required
                        autocomplete="current-password" />
                    <InputError class="mt-2" :message="form.errors.password" />
                </div>

                <div class="block mt-4">
                    <label class="flex items-center">
                        <Checkbox v-model:checked="form.remember" name="remember" />
                        <span class="ms-2 text-sm text-gray-600">Remember me</span>
                    </label>
                </div>

                <div class="flex items-center justify-end mt-4">
                    <Link v-if="canResetPassword" :href="route('password.request')"
                        class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Forgot your password?
                    </Link>

                    <PrimaryButton class="ms-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Log in
                    </PrimaryButton>
                </div>
            </form>
        </AuthenticationCard> -->
    </BaseLayout>

</template>

<script setup lang="ts">
import { Head, Link, useForm } from '@inertiajs/vue3';
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';
import Checkbox from '@/Components/Checkbox.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { NForm, NFormItem, NButton, NCheckbox, NInput, NAlert, FormRules, FormInst } from 'naive-ui';
import BaseLayout from '@/Layouts/BaseLayout.vue';
import { ref } from 'vue';

interface Login {
    email: string;
    password: string;
    remember: boolean;
}

defineProps({
    canResetPassword: Boolean,
    status: String,
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
            onFinish: () => form.reset('password'),
        });
    })
};
</script>