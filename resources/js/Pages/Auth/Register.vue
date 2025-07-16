<template>
    <Head title="Register" />
    <div class="flex items-center flex-col justify-center">
        <h1 class="mb-3">Register a new account</h1>
        <form>
            <div class="mb-3">
                <label for="name">Name: </label>
                <input
                    type="text"
                    id="name"
                    class="border rounded px-1 block"
                />
            </div>
            <div class="mb-3">
                <label for="email">Email: </label>
                <input
                    type="text"
                    id="email"
                    class="border rounded px-1 block"
                />
            </div>
            <div class="mb-3">
                <label for="password">Password: </label>
                <input
                    type="text"
                    id="password"
                    class="border rounded px-1 block"
                />
            </div>
            <div class="mb-3">
                <label for="confirmPassword">Confirm Password: </label>
                <input
                    type="text"
                    id="confirmPassword"
                    class="border rounded px-1 block"
                />
            </div>
        </form>
    </div>
</template>

<script setup></script>

<style lang="scss" scoped></style>
