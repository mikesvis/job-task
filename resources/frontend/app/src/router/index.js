import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Home.vue'
import Category from '../views/Category.vue'
import NotFound from '../views/NotFound.vue'

Vue.use(VueRouter)

  const routes = [
    {
        name: 'not-found',
        path: '/404',
        component: NotFound
    },
    {
        path: '*',
        redirect: '404'
    },
    {
        path: '/',
        name: 'Home',
        component: Home
    },
    {
        path: '/category/:categoryId',
        name: 'category',
        component: Category,
        props: true
    }

]

const router = new VueRouter({
  mode: 'history',
  base: '/',
  linkActiveClass: 'nav__link--active',
  routes
})

export default router
