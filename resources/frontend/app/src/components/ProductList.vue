<template>
    <div class="columns is-multiline">
        <product-list-item v-for="product in products" :key="product.id" :product="product"></product-list-item>
    </div>
</template>

<script>
import ProductListItem from '@/components/ProductListItem.vue'

export default {
    components: {
        ProductListItem
    },
    props: {
        products: {
            required: true
        }
    }
}
</script>
