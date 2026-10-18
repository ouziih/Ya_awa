<template>
  <button class="category" :style="{ '--category-color': categorie.color }">
       <img :alt="categorie.name" height="48" :src="categorie.image" width="56"/>
       <span>
        {{ categorie.name }}
       </span>
    </button>
</template>

<script setup>
defineProps({
    categorie: {
        type: Object,
        required: true,
    },
});
</script>