<template>
    <li class="nav__item" :class="liClass">
        <router-link :to="{ name: 'category', params: { categoryId: item.id }}" class="nav__link" :class="aClass">{{ item.title }}</router-link>
    </li>
</template>

<script>
export default {
    name: 'navigation-item',
    props: {
        item: {
            type: Object,
            required: true
        },
    },
    computed: {
        level() {
            return this.item.depth - 1
        },
        liClass() {
            return `nav__item--level-${this.level}`
        },
        aClass() {
            return `nav__link--level-${this.level}`
        },
    }
}
</script>
