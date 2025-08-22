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
                <tr>
                    <td class="w-[80%]">John</td>
                    <td class="w-[20%]">Delete</td>
                </tr>
                <tr>
                    <td class="w-[80%]">Jane</td>
                    <td class="w-[20%]">Edit</td>
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
</script>

<style lang="scss" scoped></style>