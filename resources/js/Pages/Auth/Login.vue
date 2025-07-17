<template>
    <div class="flex justify-center items-center mt-5">
        <form>
            <TextInput
                :props="{
                    type: 'name',
                    for: 'name',
                    label: 'Name',
                    errorMessage: form.errors.name,
                }"
                v-model="form.name"
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
        </form>
    </div>
</template>

<script setup>
import TextInput from "@/Components/TextInput.vue";
</script>

<style lang="scss" scoped></style>
