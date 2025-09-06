<template>
    <BaseLayout>

        <Head :title="title" />

        <nav class="bg-[#00809D] border-gray-00 ">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                <h1 class="text-4xl font-bold text-white">
                    Easy<span class="text-yellow-400">Pay</span>
                </h1>
                <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse cursor-pointer">
                    <n-dropdown trigger="click" :options="options">
                        <n-avatar round size="large" src="https://07akioni.oss-cn-beijing.aliyuncs.com/07akioni.jpeg" />
                    </n-dropdown>
                    <button data-collapse-toggle="navbar-user" type="button"
                        class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-white rounded-lg md:hidden hover:bg-yellow-400 focus:outline-none focus:ring-2 focus:ring-gray-200 "
                        aria-controls="navbar-user" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 17 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 1h15M1 7h15M1 13h15" />
                        </svg>
                    </button>
                </div>
                <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
                    <ul
                        class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 text-white">
                        <li>
                            <a href="#"
                                class="block py-2 px-3 text-white bg-yellow-400 rounded-sm md:bg-transparent md:text-yellow-400 md:p-0 "
                                aria-current="page">Dashboard</a>
                        </li>
                        <li>
                            <a href="#"
                                class="block py-2 px-3 rounded-sm hover:bg-gray-100 hover:text-black md:hover:bg-transparent md:hover:text-gray-400 md:p-0">Semua
                                Tagihan</a>
                        </li>
                        <li>
                            <a href="#"
                                class="block py-2 px-3 rounded-sm hover:bg-gray-100 hover:text-black md:hover:bg-transparent md:hover:text-gray-400 md:p-0">Jadwal
                                Tagihan</a>
                        </li>
                        <li>
                            <a href="#"
                                class="block py-2 px-3 rounded-sm hover:bg-gray-100 hover:text-black md:hover:bg-transparent md:hover:text-gray-400 md:p-0">Tagihan
                                Saya</a>
                        </li>
                        <li>
                            <a href="#"
                                class="block py-2 px-3 rounded-sm hover:bg-gray-100 hover:text-black md:hover:bg-transparent md:hover:text-gray-400 md:p-0">History
                                Pembayaran</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="w-full mt-3 max-w-6xl mx-auto px-4 md:px-0 ">
            <slot />
        </div>


        <footer class="mt-20 bg-gray-800">
            <div class="w-full mx-auto max-w-screen-xl p-4 md:flex md:items-center md:justify-between ">
                <span class="text-sm sm:text-center text-gray-400">© 2023 <a
                        href="#" class="hover:underline">CreativeDigital™</a>. All Rights Reserved.
                </span>
                <ul
                    class="flex flex-wrap items-center mt-3 text-sm font-medium text-gray-400 sm:mt-0">
                    <li>
                        <a href="#" class="hover:underline me-4 md:me-6">About</a>
                    </li>
                    <li>
                        <a href="#" class="hover:underline me-4 md:me-6">Privacy Policy</a>
                    </li>
                    <li>
                        <a href="#" class="hover:underline me-4 md:me-6">Licensing</a>
                    </li>
                    <li>
                        <a href="#" class="hover:underline">Contact</a>
                    </li>
                </ul>
            </div>
        </footer>

    </BaseLayout>
</template>

<script setup lang="ts">
import { Auth } from '@/Pages/types/global';
import BaseLayout from './BaseLayout.vue';
import { Head, usePage } from '@inertiajs/vue3';
import { NDropdown, NButton, NAvatar, NText } from 'naive-ui';
import { h, PropType } from 'vue';

const props = defineProps({
    title: String,
    auth: Object
});

const page = usePage<{ auth: Auth }>();

function renderCustomHeader() {
    return h(
        'div',
        {
            style: 'display: flex; align-items: center; padding: 8px 12px;'
        },
        [
            h('div', null, [
                h('div', null, [
                    h(NText, { depth: 2 }, { default: () => page.props.auth.user.name })
                ]),
                h('div', { style: 'font-size: 12px;' }, [
                    h(NText, { depth: 3 }, { default: () => page.props.auth.user.email })
                ])
            ])
        ]
    )
}

const options = [
    {
        key: 'header',
        type: 'render',
        render: renderCustomHeader
    },
    {
        key: 'header-divider',
        type: 'divider'
    },
    {
        label: 'lpsum1',
        key: 'stmt1'
    },
    {
        label: 'lpsum2',
        key: 'stmt2'
    },
    {
        label: 'lpsum3',
        key: 'stmt3'
    }
]
</script>