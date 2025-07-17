<template>
    <Head title="Register" />
    <div class="flex items-center flex-col justify-center">
        <h1 class="mb-3 uppercase">Register a new account</h1>
        <form class="p-5 border rounded-lg w-96" @submit.prevent="submitForm">
            <TextInput
                :props="{
                    type: 'text',
                    for: 'name',
                    label: 'Name',
                    errorMessage: form.errors.name,
                }"
                v-model="form.name"
            />

            <TextInput
                :props="{
                    type: 'email',
                    for: 'email',
                    label: 'Email',
                    errorMessage: form.errors.email,
                }"
                v-model="form.email"
            />

            <TextInput
                :props="{
                    type: 'password',
                    for: 'password',
                    label: 'Password',
                    errorMessage: form.errors.password,
                }"
                v-model="form.password"
            />

            <TextInput
                :props="{
                    type: 'password',
                    for: 'password_confirmation',
                    label: 'Confirm Password',
                    errorMessage: form.errors.password_confirmation,
                }"
                v-model="form.password_confirmation"
            />

            <button
                class="px-3 py-1 rounded-lg bg-blue-600 text-white ml-auto block"
                :disabled="form.processing"
            >
                Register
            </button>
        </form>
    </div>
</template>

<script setup>
// import { ref,reactive } from 'vue'
import { useForm } from "@inertiajs/vue3";
import Swal from "sweetalert2";
import TextInput from "@/Components/TextInput.vue";

const form = useForm({
    name: null,
    email: null,
    password: null,
    password_confirmation: null,
});

const submitForm = () => {
    form.post(route("register"), {
        preserveScroll: true,
        onError: (errors) => {
            form.reset("password", "password_confirmation");
        },
        onSuccess: () => {
            Swal.fire({
                title: "Success",
                text: "Registration successful!",
                icon: "success",
                confirmButtonText: "OK",
            }).then(() => {
                form.processing = false;
                form.reset();
            });
        },
    });
};
</script>

<style lang="scss" scoped></style>
