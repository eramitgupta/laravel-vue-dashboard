<script setup>
import SideMenu from '@/Components/Sidebar/SideMenu.vue';
</script>
<template>
    <SideMenu>
        <main class="min-h-screen bg-slate-50 py-10 dark:bg-gray-900">
            <div class="px-4 sm:px-6 lg:px-8">
                <slot />
            </div>
        </main>
    </SideMenu>
</template>
