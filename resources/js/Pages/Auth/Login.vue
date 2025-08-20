<template>

    <Head title="Login" />
    <div class="border border-gray-100 shadow-lg rounded-md p-5 w-[30rem]">
        <h1 class="text-4xl text-center font-bold block mx-auto my-2">Login</h1>
        <form>
            <FormInput v-for="field in fields" :key="field.model" :form="field" v-model="form[field.model]"
                :errors="form.errors" />
            <Link class="hover:text-blue-900" :href="route('password.request')">Forgot Password?</Link>
            <button class="mt-2 rounded-md w-full py-1 bg-blue-950 text-white hover:bg-blue-900 cursor-pointer"
                type="submit" :disabled="form.processing">Submit</button>
            <p class="mt-2 block">Don't have an account?
                <Link class="text-blue-950 hover:text-blue-900" :href="route('register')">Sign Up</Link>
            </p>
        </form>
    </div>
</template>

<script setup>
import { reactive } from 'vue'
import GuestLayout from '@/Layouts/GuestLayout.vue'
import FormInput from '@/Components/FormInput.vue'
defineOptions({
    layout: GuestLayout
})

const form = reactive({
    email: '',
    username: ''
})

const fields = [
    { type: "text", label: "Username :", model: "username", id: "username", name: "username", placeholder: "Enter username", inputClass: "mt-1 w-full h-10", labelClass: "block font-bold" },
    { type: "password", label: "Password :", model: "password", id: "password", name: "password", placeholder: "Enter password", inputClass: "mt-1 w-full h-10", labelClass: "block font-bold" },
];

</script>

<style lang="scss" scoped></style>