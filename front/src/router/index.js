import Vue from 'vue'
import VueRouter from 'vue-router'
import HomeView from '../views/HomeView.vue'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView
  },
  {
    path: '/vinyls',
    name: 'vinyls',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "about" */ '../views/ListVue.vue')
  },
  {
    path: '/vinyls/:recordId',
    name: 'recordDetails',
    component: () => import('../views/DetailVue.vue')
  },
  {
    path:'/admin',
    name:'admin',
    component:() => import('../views/AdminVue.vue')
  },
  {
    path:'/admin/create',
    name:'create',
    component:() =>import('../components/FormulaireAdmin.vue')
  }
]

const router = new VueRouter({
  routes
})


export default router


