import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import Imprint from "@/views/Imprint.vue";
import OrderList from "@/views/OrderList.vue";
import OrderOverview from "@/views/OrderOverview.vue";
import Classlist from "@/views/Classlist.vue";

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/about',
      name: 'about',
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: () => import('../views/AboutView.vue')
    },
    {
      path:'/imprint',
      name: 'imprint',
      component: Imprint
    },
    {
      path:'/orderList',
      name: 'orderList',
      component: OrderList
    } ,
    {
      path:'/orderOverview',
      name: 'orderOverview',
      component: OrderOverview
    },
    {
      path: '/classList',
      name:'classList',
      component: Classlist
    }
  ]
})

export default router
