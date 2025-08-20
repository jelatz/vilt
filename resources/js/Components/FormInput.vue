<template>
    <div class="mb-3">
        <label v-if="form.label" :for="form.id" :class="form.labelClass">{{ form.label }}</label>

        <!-- Text / Email / Password / Number -->
        <input v-if="['text', 'email', 'password', 'number', 'date'].includes(form.type)" :type="form.type"
            :id="form.id" :name="form.name" :placeholder="form.placeholder"
            :class="['rounded-md border shadow-md px-2 py-1', form.inputClass]" :value="modelValue" @input="onInput" />

        <!-- Textarea -->
        <textarea v-else-if="form.type === 'textarea'" :id="form.id" :name="form.name" :placeholder="form.placeholder"
            :class="form.inputClass" :value="modelValue" @input="onInput"></textarea>

        <!-- Select -->
        <select v-else-if="form.type === 'select'" :id="form.id" :name="form.name"
            :class="['rounded-md border shadow-md px-2 py-1', form.inputClass]" :value="modelValue"
            @change="$emit('update:modelValue', $event.target.value)">
            <option v-for="(option, i) in form.options" :key="i" :value="option.value">{{ option.label }}</option>
        </select>

        <!-- Radio -->
        <div v-else-if="form.type === 'radio'" class="flex gap-2">
            <label v-for="(option, i) in form.options" :key="i" class="flex items-center gap-1">
                <input type="radio" :name="form.name" :value="option.value" :checked="modelValue === option.value"
                    @change="$emit('update:modelValue', option.value)" />
                {{ option.label }}
            </label>
        </div>

        <!-- Checkbox (array) -->
        <div v-else-if="form.type === 'checkbox'" class="flex gap-2">
            <label v-for="(option, i) in form.options" :key="i" class="flex items-center gap-1">
                <input type="checkbox" :value="option.value"
                    :checked="Array.isArray(modelValue) && modelValue.includes(option.value)" @change="(e) => {
                        let arr = Array.isArray(modelValue) ? [...modelValue] : [];
                        if (e.target.checked) arr.push(option.value);
                        else arr = arr.filter(v => v !== option.value);
                        $emit('update:modelValue', arr);
                    }" />
                {{ option.label }}
            </label>
        </div>
        <!-- Error message -->
        <p v-if="errors && errors[form.model]" class="text-red-500 text-sm mt-1">
            {{ errors[form.model] }}
        </p>
    </div>
</template>

<script setup>
defineProps({
    modelValue: [String, Number, Boolean, Array],
    form: Object,
    errors: Object,
})

const emit = defineEmits(['update:modelValue', 'clearError', 'invalidEmail'])

// regex for email
const isValidEmail = (value) => {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/
    return re.test(value)
}

const onInput = (e) => {
    const value = e.target.value
    emit('update:modelValue', value)
    emit('clearError', e.target.name)

    if (e.target.type === 'email') {
        if (!isValidEmail(value)) {
            emit('invalidEmail', { field: e.target.name, message: 'Invalid email address' })
        } else {
            emit('invalidEmail', { field: e.target.name, message: null })
        }
    }
}
</script>
