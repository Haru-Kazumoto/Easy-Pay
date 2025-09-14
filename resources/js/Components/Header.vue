<template>
    <header class="bg-[#00809D]">
        <nav>
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                <h1 class="text-4xl font-bold text-white">
                    Easy<span class="text-yellow-400">Pay</span>
                </h1>
                <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse cursor-pointer">
                    <n-dropdown trigger="click" :options="options" size="large" :style="{ width: '170px' }"
                        @select="handleSelect">
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
                            <Link :href="route('dashboard')" :class="[
                                'block py-2 px-3 rounded-sm md:p-0',
                                route().current('dashboard')
                                    ? 'text-yellow-400'
                                    : 'text-white hover:bg-gray-100 hover:text-black md:hover:bg-transparent md:hover:text-gray-400'
                            ]">
                            Dashboard
                            </Link>
                        </li>

                        <li>
                            <Link :href="route('bills.index')" :class="[
                                'block py-2 px-3 rounded-sm md:p-0',
                                route().current('bills.index')
                                    ? 'text-yellow-400'
                                    : 'text-white hover:bg-gray-100 hover:text-black md:hover:bg-transparent md:hover:text-gray-400'
                            ]">
                            Semua Tagihan
                            </Link>
                        </li>
                        <li>
                            <Link :href="route('bills.my-bills')" :class="[
                                'block py-2 px-3 rounded-sm md:p-0',
                                route().current('bills.my-bills')
                                    ? 'text-yellow-400'
                                    : 'text-white hover:bg-gray-100 hover:text-black md:hover:bg-transparent md:hover:text-gray-400'
                            ]">
                            Tagihan
                            Saya</Link>
                        </li>
                        <li>
                            <Link :href="route('payments.history')" :class="[
                                'block py-2 px-3 rounded-sm md:p-0',
                                route().current('payments.history')
                                    ? 'text-yellow-400'
                                    : 'text-white hover:bg-gray-100 hover:text-black md:hover:bg-transparent md:hover:text-gray-400'
                            ]">
                            History
                            Pembayaran</Link>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
</template>

<script setup lang="ts">
import { Auth } from '@/Pages/types/global';
import { usePage, Link, router } from '@inertiajs/vue3';
import { NDropdown, NAvatar, NText, useMessage } from 'naive-ui';
import { h } from 'vue';

const page = usePage<{ auth: Auth }>();
const message = useMessage();

function handleSelect(key: string | number) {
    switch (key) {
        case "my-profile":
            router.visit(route('profile.show'));
            break;
        case "logout":
            router.post(route('logout'), {}, {
                onProgress: () => message.loading("Proses Logout..."),
                onSuccess: () => message.success("Berhasil Logout!"),
            });
            break;
        default:
            break;
    }
}

function renderCustomHeader() {
    return h(
        'div',
        {
            style: 'display: flex; flex-direction: column; align-items: center; padding: 8px 12px;'
        },
        [
            h(NAvatar, {
                round: true,
                size: 60,
                src: 'https://07akioni.oss-cn-beijing.aliyuncs.com/demo1.JPG'
            }),
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
        label: "Profile Saya",
        key: "my-profile",
        icon: () =>
            h(
                "svg",
                {
                    xmlns: "http://www.w3.org/2000/svg",
                    fill: "none",
                    viewBox: "0 0 24 24",
                    strokeWidth: "1.5",
                    stroke: "currentColor",
                    class: "w-5 h-5"
                },
                [
                    h("path", {
                        strokeLinecap: "round",
                        strokeLinejoin: "round",
                        d: "M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"
                    })
                ]
            )
    },
    {
        label: "Logout",
        key: "logout",
        icon: () =>
            h(
                "svg",
                {
                    xmlns: "http://www.w3.org/2000/svg",
                    fill: "none",
                    viewBox: "0 0 24 24",
                    strokeWidth: "1.5",
                    stroke: "currentColor",
                    class: "w-5 h-5 text-red-500"
                },
                [
                    h("path", {
                        strokeLinecap: "round",
                        strokeLinejoin: "round",
                        d: "M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6A2.25 2.25 0 005.25 5.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9"
                    })
                ]
            )
    }
]
</script>

<style scoped></style>