<script setup>
defineProps(['message']);
</script>

<template>
    <div v-show="message">
        <p class="text-danger fs-6">
            {{ message }}
        </p>
    </div>
</template>
