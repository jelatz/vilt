<template>
    <Head :title="$page.component" />
    <div>
        <Link :href="route('about')" class="text-blue-600 hover:text-blue-800">
            Go to About
        </Link>

        <p>{{ success }}</p>
        <p>{{ result.name }}</p>
    </div>
</template>

<script setup>
import { usePage } from "@inertiajs/vue3";

const { result, success } = usePage().props;

</script>

<style lang="scss" scoped></style>
