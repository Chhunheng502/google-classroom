import Vue from 'vue'
import VueRouter from 'vue-router'

import Dashboard from '@/Layout/DashboardLayout'
import Classwork from '@/Pages/Classwork/Index'
import ClassworkDetail from '@/Pages/Classwork/Detail'
import Report from '@/Pages/Report/Index'
import Discussion from '@/Pages/Discussion/Index'
import DiscussionDetail from '@/Pages/Discussion/Detail'

Vue.use(VueRouter)
   
const routes = [
  { path: '/', component: Dashboard },
  { path: '/cl/:classroom_id/classworks', component: Classwork },
  { path: '/cl/:classroom_id/:classworks/:classwork_id', component: ClassworkDetail },
  { path: '/cl/classroom_id/reports', component: Report },
  { path: '/cl/classroom_id/discussions', component: Discussion },
  { path: '/cl/classroom_id/discussions/1', component: DiscussionDetail },
]
  
const router = new VueRouter({
  mode: 'history',
  routes
})

export default router