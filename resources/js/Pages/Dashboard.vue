<template>
    <div class="container mx-auto mt-5">
        <Table>
            <!-- Header -->
            <template #head>
                <th class="w-[80%]">User</th>
                <th class="w-[20%]">Action</th>
            </template>

            <!-- Body -->
            <template #body>
                <tr v-for="user in users.data" :key="user.id">
                    <td class="w-[80%]">{{ user.name }}</td>
                    <td class="w-[20%]">
                        <button @click="deleteUser(user.id)" class="hover:text-red-600">Delete</button>
                    </td>
                </tr>
            </template>
            <template #foot>
                <tr>
                    <td colspan="2" class="text-center">End of Table</td>
                </tr>

            </template>
        </Table>
    </div>
</template>

<script setup>
import Table from '@/Components/Table.vue'
import { defineProps } from 'vue'
import { router } from '@inertiajs/vue3'
import Swal from 'sweetalert2'

defineProps({
    users: Object,
})

const deleteUser = (id) => {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            router.delete(route('users.destroy', id), {
                onSuccess: () => {
                    Swal.fire('Deleted!', 'User has been deleted.', 'success')
                },
                onError: () => {
                    Swal.fire('Error!', 'There was an error deleting the user.', 'error')
                }
            })
        }
    })
}
</script>

<style scoped></style>