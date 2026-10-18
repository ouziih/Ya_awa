voi<script setup>
defineProps({
    actif: {
        type: Boolean,
        required: true,
    },
});

const emit = defineEmits(['cliquer']);
</script>

<template>
    <button
        :class="{ actif: actif }"
        class="btn secondary small-btn"
        type="button"
        @click="emit('cliquer')"
    >
        <slot></slot>
    </button>
</template>

<style scoped>
.actif {
    background: var(--brand);
    border-color: var(--brand);
    color: #fff;
}
</style>
