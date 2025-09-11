<template>
    <n-config-provider :theme-overrides="naiveuiThemeOverridesLoginLayout">
        <n-notification-provider>
            <n-message-provider>
                <div class="bg-gray-100 min-h-screen">
                    <slot />
                </div>
            </n-message-provider>
        </n-notification-provider>
    </n-config-provider>
</template>

<script setup lang="ts">
import { NConfigProvider, NNotificationProvider, NMessageProvider } from 'naive-ui';
import themes from '@/Pages/themes/naiveui';

const { naiveuiThemeOverridesLoginLayout } = themes;
</script>