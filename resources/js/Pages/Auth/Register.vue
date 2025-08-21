<template>

    <Head title="Register" />
    <div class="border border-gray-100 shadow-lg rounded-md p-5 w-[30rem]">
        <h1 class="text-4xl text-center font-bold block mx-auto my-2">Register</h1>
        <form @submit.prevent="registerSubmit">
            <FormInput v-for="field in fields" :key="field.model" :form="field" v-model="form[field.model]"
                :errors="form.errors" @clearError="fieldName => delete form.errors[fieldName]" @invalidEmail="({ field, message }) => {
                    if (message) form.errors[field] = message
                    else delete form.errors[field]
                }" />
            <button class="mt-2 rounded-md w-full py-1 bg-blue-950 text-white hover:bg-blue-900 cursor-pointer"
                type="submit" :disabled="form.processing">Submit</button>
            <p class="mt-2 block">Already have an account?
                <Link class="text-blue-950 hover:text-blue-900" :href="route('login')">Sign In</Link>
            </p>
        </form>
    </div>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3'
import GuestLayout from '@/Layouts/GuestLayout.vue'
import FormInput from '@/Components/FormInput.vue'
import Swal from "sweetalert2";
import { router } from '@inertiajs/vue3'


defineOptions({
    layout: GuestLayout
})

const fields = [
    { type: "text", label: "Username :", model: "username", id: "username", name: "username", placeholder: "Enter username", inputClass: "mt-1 w-full h-10", labelClass: "block font-bold" },
    { type: "email", label: "Email :", model: "email", id: "email", name: "email", placeholder: "Enter email", inputClass: "mt-1 w-full h-10", labelClass: "block font-bold" },
    { type: "password", label: "Password :", model: "password", id: "password", name: "password", placeholder: "Enter password", inputClass: "mt-1 w-full h-10", labelClass: "block font-bold" },
    { type: "password", label: "Confirm Password :", model: "password_confirmation", id: "password_confirmation", name: "password_confirmation", placeholder: "Confirm password", inputClass: "mt-1 w-full h-10", labelClass: "block font-bold" }
];

const form = useForm({
    email: '',
    username: '',
    password: '',
    password_confirmation: ''
})



const registerSubmit = () => {
    form.post(route('register.store'), {
        onSuccess: () => {
            form.reset()
            Swal.fire({
                title: 'Registered!',
                text: 'Your account has been created successfully.',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then(() => {
                router.visit(route('login'))
            })
        },
        onError: () => {
            Swal.fire({
                title: 'Error!',
                text: 'There was an error creating your account. Please contact IT Department',
                icon: 'error',
                confirmButtonText: 'OK'
            }).then(() => {
                form.reset();
            })
        }
    })
}




</script>

<style lang="scss" scoped></style>