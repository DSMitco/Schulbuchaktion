import { createRouter, createWebHistory } from 'vue-router'
import AboutView from '../views/AboutView.vue'
import AGBView from '../views/AGB.vue'
import Classlist from '../views/Classlist.vue'
import FAQView from '../views/FAQ.vue'
import HomeView from '../views/HomeView.vue'
import ImprintView from '../views/Imprint.vue'
import LoginView from '../views/LoginView.vue'
import OrderListView from '../views/OrderList.vue'
import OrderOverview from '../views/OrderOverview.vue'
import ImportView from '../views/ImportView.vue';
import BookList from "@/views/BookList.vue";

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
      component: AboutView
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      // component: () => import('../views/AboutView.vue')
    },
    {
      path: '/AGB',
      name: 'AGBView',
      component: AGBView
    },
    {
      path: '/classList',
      name: 'classList',
      component: Classlist
    },
    {
      path: '/FAQ',
      name: 'FAQView',
      component: FAQView
    },
    {
      path: '/imprint',
      name: 'imprintView',
      component: ImprintView
    },
    {
      path: '/login',
      name: 'loginView',
      component: LoginView
    },
    {
      path: '/orderList',
      name: 'orderListView',
      component: OrderListView
    },
    {
      path: '/orderOverview',
      name: 'orderOverView',
      component: OrderOverview
    },
    {
      path: '/importView',
      name: 'importView',
      component: ImportView
    },
    {
      path: '/bookList',
      name: 'bookList',
      component: BookList
    }
  ]
})

export default router
