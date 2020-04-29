<template>
    <div id="app">

        <section class="section">
            <div class="container">
                <div class="columns">
                    <div class="column is-one-quarter">
                        <navigation v-if="items" :level="level" :id="1" :items="items"></navigation>
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
import Navigation from '@/components/Navigation.vue'

export default {
    components: {
        Navigation
    },
    data() {
        return {
            items: [],
            level: 0
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
