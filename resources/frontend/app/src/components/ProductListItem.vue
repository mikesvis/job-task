<template>
    <div class="column is-4">
        <div class="card card--full-height">
            <div class="card-image">
                <figure class="image is-16by9">
                    <img :src="product.image_path" :alt="product.title">
                </figure>
            </div>
            <div class="card-content">
                <div class="content">
                    <h5 class="title is-5" v-text="product.title"></h5>
                    <div v-html="product.description"></div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        product: {
            required: true
        }
    }
}
</script>
