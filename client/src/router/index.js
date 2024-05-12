import { createRouter, createWebHistory } from 'vue-router'

const routes = [
    {
        path: '/',
        name: 'Home',
        component: () => import('../views/Main/Home.vue'),
        meta: {
            layout: 'Default',
            auth: false
        }
    },
    {
        path: '/login',
        name: 'Login',
        component: () => import('../views/Main/Login.vue'),
        meta: {
            layout: 'Default',
            auth: false
        }
    },
    {
        path: '/register',
        name: 'Register',
        component: () => import('../views/Main/Register.vue'),
        meta: {
            layout: 'Default',
            auth: false
        }
    },
    {
        path: '/profile',
        name: 'Profile',
        component: () => import('../views/Main/Profile.vue'),
        meta: {
            layout: 'Default',
            auth: true
        }
    },
    {
        path: '/profile/history',
        name: 'History',
        component: () => import('../views/Main/History.vue'),
        meta: {
            layout: 'Default',
            auth: true
        }
    },
    {
        path: '/books',
        name: 'Books',
        component: () => import('../views/Main/Books.vue'),
        meta: {
            layout: 'Default',
            auth: false
        }
    },
    {
        path: '/book/:id',
        name: 'Book',
        component: () => import('../views/Main/Book.vue'),
        meta: {
            layout: 'Default',
            auth: false
        }
    },
    {
        path: '/dashboard',
        name: 'Dashboard',
        component: () => import('../views/Admin/Dashboard.vue'),
        meta: {
            layout: 'admin',
            auth: true
        }
    },
]

const router = createRouter({
    history: createWebHistory(),
    routes
})

router.beforeEach((to, from, next) => {
    const loggedIn = localStorage.getItem('user')

    if (to.matched.some(record => record.meta.auth)) {
        if (!loggedIn) {
            next({
                path: '/login',
                query: { redirect: to.fullPath }
            })
        } else {
            next()
        }
    } else {
        next()
    }
})
export default router