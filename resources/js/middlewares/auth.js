export default function auth({ next, router }) {
    if (!localStorage.getItem('token')) {
        return router.push({ name: 'member-login' });
    }
    return next();
}

