<template>
    <div class="overflow-x-auto">
        <table class="w-full border-collapse bg-gray-100">
            <thead class="sticky text-left bg-gray-200">
                <tr>
                    <!-- Use slots for header -->
                    <slot name="head" />
                </tr>
            </thead>
            <tbody>
                <!-- Slot for rows -->
                <slot name="body" />
            </tbody>
            <tfoot>
                <slot name="foot" />
            </tfoot>
        </table>
    </div>
</template>

<script setup>
</script>

<style scoped>
:deep(table>thead>tr>th),
:deep(table>tbody>tr>td) {
    padding: 0.5rem;
    border-bottom: 1px solid #eee;
}

:deep(table>tbody>tr:hover) {
    background-color: gray;
    color: white;
}
</style>
