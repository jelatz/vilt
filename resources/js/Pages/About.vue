<template>
    <div>
        <Link href="/" class="text-blue-600 hover:text-blue-800">
            Go to Home
        </Link>
        <h1>hey {{ user }}</h1>
    </div>
</template>

<script setup>
defineProps({
    user: String,
});
</script>

<style lang="scss" scoped></style>
