import Vue from 'vue'
import VueRouter from 'vue-router'

import Dashboard from '@/Layout/DashboardLayout'
import Material from '@/Pages/Material/Index'
import MaterialDetail from '@/Pages/Material/Detail'
import Task from '@/Pages/Task/Index'
import Report from '@/Pages/Report/Index'
import Discussion from '@/Pages/Discussion/Index'
import DiscussionDetail from '@/Pages/Discussion/Detail'

Vue.use(VueRouter)
   
const routes = [
  { path: '/', component: Dashboard },
  { path: '/cl/classroom_id/materials', component: Material },
  { path: '/cl/classroom_id/materials/1', component: MaterialDetail },
  { path: '/cl/classroom_id/tasks', component: Task },
  { path: '/cl/classroom_id/reports', component: Report },
  { path: '/cl/classroom_id/discussions', component: Discussion },
  { path: '/cl/classroom_id/discussions/1', component: DiscussionDetail },
]
  
const router = new VueRouter({
  mode: 'history',
  routes
})

export default router