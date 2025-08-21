<template>
    <div class="">
        <nav class="w-full bg-gray-400 flex items-stretch justify-between">
            <Link :href="route('dashboard')" class="p-3">Dashboard</Link>
            <Link :href="route('logout')" class="p-3">Logout</Link>
        </nav>
        <slot />
    </div>
</template>

<script setup>

</script>

<style lang="scss" scoped></style>