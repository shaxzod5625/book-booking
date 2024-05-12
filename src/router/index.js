import { createRouter, createWebHistory } from 'vue-router'

const routes = [
    {
        path: '/',
        name: 'Home',
        component: () => import('../views/Main/Home.vue'),
        meta: {
            layout: 'Main'
        }
    },
    {
        path: '/login',
        name: 'Login',
        component: () => import('../views/Main/Login.vue'),
        meta: {
            layout: 'Main'
        }
    },
    {
        path: '/register',
        name: 'Register',
        component: () => import('../views/Main/Register.vue'),
        meta: {
            layout: 'Main'
        }
    },
    {
        path: '/profile',
        name: 'Profile',
        component: () => import('../views/Main/Profile.vue'),
        meta: {
            layout: 'Main'
        }
    },
    {
        path: '/profile/history',
        name: 'History',
        component: () => import('../views/Main/History.vue'),
        meta: {
            layout: 'Main'
        }
    },
    {
        path: '/books',
        name: 'Books',
        component: () => import('../views/Main/Books.vue'),
        meta: {
            layout: 'Main'
        }
    },
    {
        path: '/book/:id',
        name: 'Book',
        component: () => import('../views/Main/Book.vue'),
        meta: {
            layout: 'Main'
        }
    },
    {
        path: '/dashboard',
        name: 'Dashboard',
        component: () => import('../views/Admin/Dashboard.vue'),
        meta: {
            layout: 'Admin'
        }
    },
]

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router