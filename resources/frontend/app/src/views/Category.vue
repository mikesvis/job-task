<template>
    <div>
        <h1 class="title" v-text="category.title"></h1>
        <product-list v-if="products" :products="products"></product-list>
    </div>
</template>

<script>
import ProductList from '@/components/ProductList.vue'

export default {
    components: {
        ProductList
    },
    props: {
        categoryId: {
            required: true
        }
    },
    data() {
        return {
            category: {},
            products:  {}
        }
    },
    methods: {
        async fetchCategory(categoryId) {
            const resource = await fetch('/api/category/' + categoryId)
                .then(response => {
                    if (!response.ok) { throw response }
                    return response.json()
                }).then(json => {
                    this.category = json.category
                    this.products = json.products
                }).catch(err => {
                    this.$router.push({path: '/not-found', name: 'not-found'})
                });
        }
    },
    mounted() {
        this.fetchCategory(this.categoryId);
    },
    watch: {
        categoryId(newCategoryId, oldCategoryId) {
            this.fetchCategory(newCategoryId);
        }
    }
}
</script>
