<template>
    <ul class="nav">
        <navigation-item v-for="item in items" :key="item.id" :item="item"></navigation-item>
    </ul>
</template>

<script>
import NavigationItem from '@/components/NavigationItem'

export default {
    name: 'navigation',
    components: {
        NavigationItem
    },
    props: {
        items: {
            required: true
        },
    },
}
</script>
