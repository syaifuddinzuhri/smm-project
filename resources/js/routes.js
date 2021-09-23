import Home from './pages/Home.vue'
import Member from './pages/Member.vue'
import Riwayat from './pages/Riwayat.vue'
import Produk from './pages/Produk.vue'
import PageNotFound from './pages/PageNotFound.vue'
import LoginMember from './pages/auth/Member.vue'
import Admin from './pages/auth/Admin.vue'

export const routes = [
    {
        name: 'auth-member',
        path: '/auth/member',
        component: LoginMember,
        meta: {
            loginLayout: true,
        }
    },
    {
        name: 'auth-admin',
        path: '/auth/admin',
        component: Admin,
        meta: {
            loginLayout: true,
        },
    },
    {
        name: 'home',
        path: '/',
        component: Home,
        // beforeEnter: (to, from, next) => {
        //     next({name: 'auth-user'})
        // }
    },
    {
        name: 'member',
        path: '/member',
        component: Member
    },
    {
        name: 'produk',
        path: '/produk',
        component: Produk
    },
    {
        name: 'riwayat-transaksi',
        path: '/riwayat-transaksi',
        component: Riwayat
    },
    {
        path: "*",
        component: PageNotFound,
         meta: {
            Error404: true,
        },
    }
];
