import Vue from 'vue'
import VueRouter from 'vue-router'
import Login from "@/views/Login";
import Home from "@/views/Home";
import Create from "@/views/Create";

Vue.use(VueRouter)

const routes = [
    {
        path: '/',
        component: Login
    },
    {
        path: '/home',
        component: Home
    },
    {
        path: '/create',
        component: Create
    },
]

const router = new VueRouter({
    routes
})

export default router
