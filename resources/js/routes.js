import Home from './pages/Home.vue'
import Member from './pages/Member.vue'
import Riwayat from './pages/Riwayat.vue'
import Produk from './pages/Produk.vue'
import PageNotFound from './pages/PageNotFound.vue'
import LoginMember from './pages/auth/Member.vue'
import Admin from './pages/auth/Admin.vue'
import Middleware from './middlewares/index'

export const routes = [
    {
        name: 'auth-member',
        path: '/auth/member',
        component: LoginMember,
        meta: {
            mmiddlewares: [Middleware.guest],
            loginLayout: true,
        }
    },
    {
        name: 'auth-admin',
        path: '/auth/admin',
        component: Admin,
        meta: {
            mmiddlewares: [Middleware.guest],
            loginLayout: true,
        },
    },
    {
        name: 'home',
        path: '/',
        component: Home,
        meta: {
            mmiddlewares: [Middleware.auth],
        }
    },
    {
        name: 'member',
        path: '/member',
        component: Member,
        meta: {
            mmiddlewares: [Middleware.auth],
        }
    },
    {
        name: 'produk',
        path: '/produk',
        component: Produk,
        meta: {
            mmiddlewares: [Middleware.auth],
        }
    },
    {
        name: 'riwayat-transaksi',
        path: '/riwayat-transaksi',
        component: Riwayat,
        meta: {
            mmiddlewares: [Middleware.auth],
        }
    },
    {
        path: "*",
        component: PageNotFound,
        meta: {
            Error404: true,
        },
    }
];
