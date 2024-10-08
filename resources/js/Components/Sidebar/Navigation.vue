<script setup>
import { computed, onMounted, ref } from 'vue';

import CommonIcon from '@/Components/Common/CommonIcon.vue';
import { usePage } from '@inertiajs/vue3';
import CommonLinkContent from './Partials/CommonLinkContent.vue';

const navigation = ref(usePage()?.props?.menu);
const activeSubmenu = ref(null);

const toggleSubmenu = itemName => {  
    if (activeSubmenu.value === itemName) {
        activeSubmenu.value = null;
    } else {
        activeSubmenu.value = itemName;
    }
};

const activeSubMenuName = computed(() => {
    const activeItem = navigation?.value
        ?.find(item => item?.subMenu?.some(subItem => subItem?.active));
    
    return activeItem?.name ?? '';
});


onMounted(() => {
    toggleSubmenu(activeSubMenuName.value);
})

</script>
<template>
    <li v-for="menu in navigation" :key="menu?.name">
        <template v-if="menu?.subMenu.length === 0">
            <Link :href="menu?.href.length === 0 ? '#' : menu?.href" :class="[
                menu?.active
                    ? 'bg-gray-200 text-indigo-600 dark:bg-gray-800'
                    : 'text-gray-700 hover:text-indigo-600',
                'group flex gap-x-3 rounded-md p-2 text-sm font-semibold leading-6 hover:bg-gray-200 dark:hover:bg-gray-800',
            ]">
                <CommonLinkContent :menu="menu" :active-submenu="activeSubmenu"/>
            </Link>
        </template>
        <template v-else>
            <a @click="toggleSubmenu(menu?.name)" :class="[
                menu?.active
                    ? 'bg-gray-200 text-indigo-600 dark:bg-gray-800'
                    : 'text-gray-700 hover:text-indigo-600',
                'group flex gap-x-3 rounded-md p-2 text-sm font-semibold leading-6 hover:bg-gray-200 dark:hover:bg-gray-800 cursor-pointer',
            ]">
                <CommonLinkContent :menu="menu" :active-submenu="activeSubmenu"/>
            </a>
        </template>

        <transition enter-active-class="transition ease-out duration-200"
            enter-from-class="opacity-0 transform -translate-y-2" enter-to-class="opacity-100 transform translate-y-0"
            leave-active-class="transition ease-in duration-150" leave-from-class="opacity-100 transform translate-y-0"
            leave-to-class="opacity-0 transform -translate-y-2">
            <ul v-if="activeSubmenu === menu?.name && menu?.subMenu.length > 0"
                class="mt-2 space-y-1 overflow-hidden pl-2">
                <li v-for="(subItem, index) in menu.subMenu" :key="index">
                    <Link :href="subItem?.href" :class="[
                        subItem?.active
                            ? 'text-indigo-600'
                            : 'text-gray-700',
                        'group flex items-center gap-x-1 rounded-md p-2 text-sm font-semibold leading-6 hover:text-indigo-600',
                    ]">
                    <CommonIcon icon="heroicons-outline:chevron-right" :class="[
                        subItem?.active
                            ? 'text-indigo-600'
                            : 'text-gray-400 group-hover:text-indigo-600',
                        'h-4 w-4 shrink-0',
                    ]" />

                    {{ subItem?.name }}
                    </Link>
                </li>
            </ul>
        </transition>
    </li>
</template>
