
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
        path:'/register',
        name:'Register',
        component:()=> import('./../pages/Auth/Register.vue')
    },
    {
        path:'/forgotpassword',
        name:'ForgotPassword',
        component:()=> import('./../pages/Auth/ForgotPassword.vue')
    },
    {
        path:"/dashboard",
        name:'Dashboard',
        component:()=> import('../pages/Dashboard.vue')
    },
];

export default routes;
