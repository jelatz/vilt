<template>
    <Head :title="$page.component" />
    <div>
        <Link :href="route('home')" class="text-blue-600 hover:text-blue-800">
            Go to Home
        </Link>
    </div>
</template>

<script setup>
import { Head } from "@inertiajs/vue3";

defineProps({
    user: String,
});
</script>

<style lang="scss" scoped></style>
