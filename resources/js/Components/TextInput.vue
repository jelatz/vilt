<template>
    <div class="mb-3">
        <label :for="props.for">{{ props.label }} : </label>
        <input
            :type="props.type"
            :id="props.for"
            v-model="model"
            :class="[
                props.input_class,
                'border rounded px-1 block w-full',
                props.errorMessage && !model ? '!border-red-500' : '',
            ]"
        />
        <small v-if="props.errorMessage && !model" class="text-red-500">{{
            props.errorMessage
        }}</small>
    </div>
</template>

<script setup>
import { watch } from "vue";
const model = defineModel({
    tyle: null,
    required: true,
});
defineProps({
    props: {
        type: Object,
        required: true,
    },
});

const emit = defineEmits(["clear-error"]);

watch(model, () => {
    emit("clear-error");
});
</script>

<style scoped></style>
