<template>
    <div id="app">

        <section class="section">
            <div class="container">
                <div class="columns">
                    <div class="column is-one-quarter">
                        <navigation v-if="items" :items="items"></navigation>
                    </div>
                    <div class="column">
                        <router-view />
                    </div>
                </div>
            </div>
        </section>

  </div>
</template>

<script>
import Navigation from '@/components/Navigation'

export default {
    components: {
        Navigation
    },
    data() {
        return {
            items: []
        }
    },
    async mounted() {
        const resource = await fetch('/api/category')
        const items = await resource.json()
        this.items = items.data
    }
}
</script>

<style lang="sass">
    @import './sass/app'
</style>
