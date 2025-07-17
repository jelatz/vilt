<template>
    <Head title="Register" />
    <div class="flex items-center flex-col justify-center">
        <h1 class="mb-3 uppercase">Register a new account</h1>
        <form class="p-5 border rounded-lg w-96" @submit.prevent="submitForm">
            <div class="mb-3">
                <label for="name">Name: </label>
                <input
                    type="text"
                    id="name"
                    v-model="form.name"
                    class="border rounded px-1 block w-full"
                />
                <small v-if="form.errors.name" class="text-red-500">{{ form.errors.name }}</small>
            </div>
            <div class="mb-3">
                <label for="email">Email: </label>
                <input
                    type="text"
                    id="email"
                    v-model="form.email"
                    class="border rounded px-1 block w-full"
                />
                <small v-if="form.errors.email" class="text-red-500">{{ form.errors.email }}</small>
            </div>
            <div class="mb-3">
                <label for="password">Password: </label>
                <input
                    type="password"
                    id="password"
                    v-model="form.password"
                    class="border rounded px-1 block w-full"
                />
                <small v-if="form.errors.password" class="text-red-500">{{ form.errors.password }}</small>
            </div>
            <div class="mb-3">
                <label for="password_confirmation">Confirm Password: </label>
                <input
                    type="password"
                    id="password_confirmation"
                    v-model="form.password_confirmation"
                    class="border rounded px-1 block w-full"
                />
                <small v-if="form.errors.password_confirmation" class="text-red-500">{{ form.errors.password_confirmation }}</small>
            </div>
            <button class="px-3 py-1 rounded-lg bg-blue-600 text-white ml-auto block" :disabled="form.processing">Register</button>
        </form>
    </div>
</template>

<script setup>      
// import { ref,reactive } from 'vue'   
import { useForm } from '@inertiajs/vue3'
import Swal from 'sweetalert2'


const form = useForm({
    name: null,
    email: null,
    password: null,
    password_confirmation: null
})

const submitForm = () =>{
   form.post('/auth/register', {
    preserveScroll: true,
    onError: (errors) =>{
        form.reset('password', 'password_confirmation');
    },
    onSuccess: () =>{
        Swal.fire({
            title: 'Success',
            text: 'Registration successful!',
            icon: 'success',
            confirmButtonText: 'OK'
        }).then(() =>{
            form.processing = false;
            form.reset();
        })
    },
   })
} 
</script>

<style lang="scss" scoped></style>
