<script setup>
defineProps({
    type: {
        type: String,
        default: 'submit',
    },
});
</script>

<template>
    <button
        :type="type"
        class="d-inline border mx-2"
    >
        <slot />
    </button>
</template>
