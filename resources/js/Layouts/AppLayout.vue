<template>
    <div>
        <header>
            <nav class="flex space-x-5 p-2 bg-gray-200">
                <Link
                    :href="route('home')"
                    class="text-blue-600 hover:text-blue-800"
                >
                    Home
                </Link>
                <Link
                    :href="route('about')"
                    class="text-blue-600 hover:text-blue-800"
                >
                    About
                </Link>
                <Link
                    :href="route('register')"
                    class="text-blue-600 hover:text-blue-800"
                >
                    Register
                </Link>
                <Link
                    :href="route('login')"
                    class="text-blue-600 hover:text-blue-800"
                >
                    Login
                </Link>
            </nav>
        </header>
    </div>
    <div class="p-5">
        <slot />
    </div>
</template>

<script setup></script>

<style lang="scss" scoped></style>
