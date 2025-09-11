<template>
    <AppLayout title="Profile">
        <HeaderBanner title="Profile Saya" backRoute="dashboard" />

        <n-card class="my-3">
            <div class="grid grid-cols-8 gap-2">
                <!-- Avatar -->
                <div class="col-span-8 sm:col-span-2 flex items-center justify-center">
                    <n-image width="250" src="https://07akioni.oss-cn-beijing.aliyuncs.com/07akioni.jpeg"
                        object-fit="cover" class="rounded-full" />
                </div>

                <!-- Profile Info -->
                <div class="col-span-6 sm:col-span-8 p-4">
                    <!-- Header -->
                    <div class="p-2 bg-[#00809D] text-white rounded-md">
                        <span class="text-3xl font-bold">John Doe</span>
                        <p class="text-white">@johndoe</p>
                    </div>

                    <!-- Info Rows -->
                    <div class="mt-6 space-y-4 text-sm md:text-base">
                        <!-- Row 1 -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <span class="font-semibold text-gray-700">Email:</span>
                                <p class="text-gray-600">johndoe@example.com</p>
                            </div>
                            <div>
                                <span class="font-semibold text-gray-700">Jurusan:</span>
                                <p class="text-gray-600">Computer Science</p>
                            </div>
                        </div>
                        <!-- Row 2 -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <span class="font-semibold text-gray-700">Kelas Saat Ini:</span>
                                <p class="text-gray-600">XII TJKT 4</p>
                            </div>
                            <div>
                                <span class="font-semibold text-gray-700">Semester:</span>
                                <p class="text-gray-600">Semester 1</p>
                            </div>
                        </div>
                        <!-- Row 2 -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <span class="font-semibold text-gray-700">Bergabung:</span>
                                <p class="text-gray-600">12 March 2024</p>
                            </div>
                            <div>
                                <span class="font-semibold text-gray-700">Wali Kelas:</span>
                                <p class="text-gray-600">Yuko Yamimoto</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- <LogoutOtherBrowserSessionsForm :sessions="sessions" class="mt-10 sm:mt-0" /> -->
        </n-card>

        <!-- <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <div v-if="$page.props.jetstream.canUpdateProfileInformation">

                    <UpdateProfileInformationForm :user="$page.props.auth.user" />

                    <SectionBorder />
                </div>

                <div v-if="$page.props.jetstream.canUpdatePassword">
                    <UpdatePasswordForm class="mt-10 sm:mt-0" />

                    <SectionBorder />
                </div>

                <div v-if="$page.props.jetstream.canManageTwoFactorAuthentication">
                    <TwoFactorAuthenticationForm :requires-confirmation="confirmsTwoFactorAuthentication"
                        class="mt-10 sm:mt-0" />

                    <SectionBorder />
                </div>

                <LogoutOtherBrowserSessionsForm :sessions="sessions" class="mt-10 sm:mt-0" />

                <template v-if="$page.props.jetstream.hasAccountDeletionFeatures">
                    <SectionBorder />

                    <DeleteUserForm class="mt-10 sm:mt-0" />
                </template>
            </div>
        </div> -->
    </AppLayout>
</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import DeleteUserForm from '@/Pages/Profile/Partials/DeleteUserForm.vue';
import LogoutOtherBrowserSessionsForm from '@/Pages/Profile/Partials/LogoutOtherBrowserSessionsForm.vue';
import SectionBorder from '@/Components/SectionBorder.vue';
import TwoFactorAuthenticationForm from '@/Pages/Profile/Partials/TwoFactorAuthenticationForm.vue';
import UpdatePasswordForm from '@/Pages/Profile/Partials/UpdatePasswordForm.vue';
import UpdateProfileInformationForm from '@/Pages/Profile/Partials/UpdateProfileInformationForm.vue';
import HeaderBanner from '@/Components/HeaderBanner.vue';
import { NCard, NImage } from 'naive-ui';

defineProps({
    confirmsTwoFactorAuthentication: Boolean,
    sessions: Array,
});
</script>
