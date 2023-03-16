<script setup>
defineProps(['value']);
</script>

<template>
    <label class="d-block ">
        <span v-if="value">{{ value }}</span>
        <span v-else><slot /></span>
    </label>
</template>
