<template>
    <Head :title="$page.component" />
    <div>
        <h1 class="text-red-600 text-3xl">hey</h1>
        <Link :href="route('about')" class="text-blue-600 hover:text-blue-800">
            Go to About
        </Link>
        <p>{{ $page.component }}</p>
        <p>{{ $page.props.user }}</p>
    </div>
</template>

<script setup></script>

<style lang="scss" scoped></style>
