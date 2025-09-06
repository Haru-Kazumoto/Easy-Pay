<template>
    <n-config-provider :theme-overrides="naiveuiThemeOverrides">
        <n-notification-provider>
            <div class="bg-gray-100 min-h-screen">
                <slot />
            </div>
        </n-notification-provider>
    </n-config-provider>
</template>

<script setup lang="ts">
import { NConfigProvider, NNotificationProvider } from 'naive-ui';
import themes from '@/Pages/themes/naiveui';

const { naiveuiThemeOverrides } = themes;
</script>