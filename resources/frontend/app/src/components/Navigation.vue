<template>
    <ul class="nav" :class="ulClass" v-if="children.length > 0">
        <li class="nav__item" :class="liClass" v-for="item in children" :key="item.id">
            <router-link :to="{ name: 'category', params: { categoryId: item.id }}" class="nav__link" :class="aClass">{{ item.title }}</router-link>
            <navigation :level="item.depth" :id="item.id" :items="items"></navigation>
        </li>
    </ul>
</template>

<script>
export default {
    name: 'navigation',
    props: {
        items: {
            required: true
        },
        level: {
            type: Number,
            required:true
        },
        id: {
            type: Number,
            required:true
        }
    },
    computed: {
        ulClass() {
            return `nav--level-${this.level}`
        },
        liClass() {
            return `nav__item--level-${this.level}`
        },
        aClass() {
            return `nav__link--level-${this.level}`
        },
        children() {
            return this.items.filter((item) => item.parent_id == this.id)
        }
    }
}
</script>
