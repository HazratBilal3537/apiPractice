
const routes = [
    // Add more dynamic imports for other components here
    {
        path:'/',
        name:'home',
        component:()=> import('./../pages/Welcome.vue')
    },
    {
        path:'/login',
        name:'Login',
        component:()=> import('./../pages/Auth/Login.vue')
    },
    {
        path:"/dashboard",
        name:'Dashboard',
        component:()=> import('../pages/Dashboard.vue')
    },
];

export default routes;
