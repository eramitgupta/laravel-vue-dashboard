<script setup>
import { ref } from 'vue';
import {
    Dialog,
    DialogPanel,
    Menu,
    MenuButton,
    MenuItems,
    TransitionChild,
    TransitionRoot,
} from '@headlessui/vue';
import Navigation from '@/Components/Sidebar/Navigation.vue';
import CommonIcon from '@/Components/Common/CommonIcon.vue';
import DropdownLink from '../DropdownLink.vue';
import { isDark, switchTheme } from '@/composables/theme';

const sidebarOpen = ref(false);

const toggleTheme = () => {
    switchTheme();
};

const shortName = (name, type = false) => {
    if (!name) {
        return 'N/A';
    }
    const nameArray = name.trim().split(' ');
    if (type === true) {
        return nameArray[0];
    }
    if (nameArray.length == 1) {
        return nameArray[0][0].toUpperCase();
    }
    return nameArray[0][0].toUpperCase() + nameArray[1][0].toUpperCase();
}


</script>
<template>
    <TransitionRoot as="template" :show="sidebarOpen">
        <Dialog class="relative z-50 lg:hidden" @close="sidebarOpen = false">
            <TransitionChild as="template" enter="transition-opacity ease-linear duration-300" enter-from="opacity-0"
                enter-to="opacity-100" leave="transition-opacity ease-linear duration-300" leave-from="opacity-100"
                leave-to="opacity-0">
                <div class="fixed inset-0 bg-gray-900/80" />
            </TransitionChild>

            <div class="fixed inset-0 flex">
                <TransitionChild as="template" enter="transition ease-in-out duration-300 transform"
                    enter-from="-translate-x-full" enter-to="translate-x-0"
                    leave="transition ease-in-out duration-300 transform" leave-from="translate-x-0"
                    leave-to="-translate-x-full">
                    <DialogPanel class="relative mr-16 flex w-full max-w-xs flex-1">
                        <TransitionChild as="template" enter="ease-in-out duration-300" enter-from="opacity-0"
                            enter-to="opacity-100" leave="ease-in-out duration-300" leave-from="opacity-100"
                            leave-to="opacity-0">
                            <div class="absolute left-full top-0 flex w-16 justify-center pt-5">
                                <button type="button" class="-m-2.5 p-2.5" @click="sidebarOpen = false">
                                    <span class="sr-only">Close sidebar</span>
                                    <CommonIcon class="h-6 w-6 text-white" icon="heroicons-outline:x-mark" />
                                </button>
                            </div>
                        </TransitionChild>
                        <!-- Sidebar component, swap this element with another sidebar if you like -->
                        <div class="flex grow flex-col gap-y-5 overflow-y-auto bg-white px-6 pb-4">
                            <div class="flex h-16 shrink-0 items-center">
                                <img class="h-8 w-auto"
                                    src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600"
                                    alt="Your Company" />
                            </div>
                            <nav class="flex flex-1 flex-col">
                                <ul role="list" class="flex flex-1 flex-col gap-y-1">
                                    <Navigation />

                                    <li class="mt-auto">
                                        <a href="#"
                                            class="group -mx-2 flex gap-x-3 rounded-md p-2 text-sm font-semibold leading-6 text-gray-700 hover:bg-gray-50 hover:text-indigo-600">
                                            <CommonIcon
                                                class="h-6 w-6 shrink-0 text-gray-400 group-hover:text-indigo-600"
                                                icon="heroicons-outline:cog-6-tooth" />
                                            Settings
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </DialogPanel>
                </TransitionChild>
            </div>
        </Dialog>
    </TransitionRoot>

    <!-- Static sidebar for desktop -->
    <div class="hidden lg:fixed lg:inset-y-0 lg:z-50 lg:flex lg:w-72 lg:flex-col">
        <!-- Sidebar component, swap this element with another sidebar if you like -->
        <div
            class="flex grow flex-col gap-y-5 overflow-y-auto border-r border-gray-200 bg-slate-50 px-6 pb-4 dark:border-gray-700 dark:bg-gray-900">
            <div class="flex h-16 shrink-0 items-center">
                <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600"
                    alt="Your Company" />
            </div>
            <nav class="flex flex-1 flex-col">
                <ul role="list" class="flex flex-1 flex-col gap-y-2">
                    <Navigation />

                    <li class="mt-auto">
                        <a href="#"
                            class="group -mx-2 flex gap-x-3 rounded-md p-2 text-sm font-semibold leading-6 text-gray-700 hover:bg-gray-50 hover:text-indigo-600">
                            <CommonIcon class="h-6 w-6 shrink-0 text-gray-400 group-hover:text-indigo-600"
                                icon="heroicons-outline:cog-6-tooth" />
                            Settings
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

    <div class="lg:pl-72">
        <div
            class="sticky top-0 z-40 flex h-16 shrink-0 items-center gap-x-4 border-b border-gray-200 bg-slate-50 px-4 shadow-sm sm:gap-x-6 sm:px-6 lg:px-8 dark:border-gray-700 dark:bg-gray-900">
            <button type="button" class="-m-2.5 p-2.5 text-gray-700 lg:hidden" @click="sidebarOpen = true">
                <span class="sr-only">Open sidebar</span>
                <CommonIcon class="h-6 w-6" icon="heroicons-outline:bars-3" />
            </button>

            <!-- Separator -->
            <div class="h-6 w-px bg-gray-200 lg:hidden" aria-hidden="true" />

            <div class="flex flex-1 gap-x-4 self-stretch lg:gap-x-6">
                <form class="relative flex flex-1" action="#" method="GET"></form>
                <div class="flex items-center gap-x-4 lg:gap-x-6">
                    <button type="button" class="-m-2.5 p-2.5 text-gray-400 hover:text-gray-500">
                        <span class="sr-only">View notifications</span>
                        <CommonIcon class="h-6 w-6" icon="heroicons-outline:bell" />
                    </button>
                    <button @click="toggleTheme" type="button" class="-m-2.5 p-2.5 text-gray-400 hover:text-gray-500">
                        <CommonIcon v-if="isDark" class="h-6 w-6" icon="heroicons-solid:light-bulb" />
                        <CommonIcon v-else class="h-6 w-6" icon="heroicons-outline:sun" />
                    </button>

                    <!-- Separator -->
                    <div class="hidden lg:block lg:h-6 lg:w-px lg:bg-gray-200" aria-hidden="true" />

                    <!-- Profile dropdown -->
                    <Menu as="div" class="relative">
                        <MenuButton class="-m-1.5 flex items-center p-1.5">
                            <span class="sr-only">Open user menu</span>
                            <span class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-gray-500">
                                <span class="text-sm font-medium leading-none text-white">
                                    {{ shortName($page.props?.auth?.user?.name) }}
                                </span>
                            </span>
                            <span class="hidden lg:flex lg:items-center">
                                <span class="ml-4 text-sm font-semibold leading-6 text-gray-900 dark:text-white"
                                    aria-hidden="true">
                                    {{ shortName($page.props?.auth?.user?.name, true) }}
                                </span>
                            </span>
                        </MenuButton>
                        <transition enter-active-class="transition ease-out duration-100"
                            enter-from-class="transform opacity-0 scale-95"
                            enter-to-class="transform opacity-100 scale-100"
                            leave-active-class="transition ease-in duration-75"
                            leave-from-class="transform opacity-100 scale-100"
                            leave-to-class="transform opacity-0 scale-95">
                            <MenuItems
                                class="absolute right-0 z-10 mt-2.5 w-40 origin-top-right rounded-md bg-slate-50 py-2 shadow-lg ring-1 ring-gray-900/5 focus:outline-none dark:bg-gray-900">
                                <DropdownLink :href="route('profile.edit')">
                                    Profile
                                </DropdownLink>
                                <DropdownLink :href="route('logout')" method="post" as="button">
                                    Log Out
                                </DropdownLink>
                            </MenuItems>
                        </transition>
                    </Menu>
                </div>
            </div>
        </div>
        <slot />
    </div>
</template>
