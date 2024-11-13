import { createRouter, createWebHistory } from 'vue-router';
const routes = [
    // Add more dynamic imports for other components here
    {
        path: "/",
        name: "home",
        component: () => import("./../pages/Welcome.vue"),
    },
    {
        path: "/login",
        name: "Login",
        component: () => import("./../pages/Auth/Login.vue"),
    },
    {
        path: "/register",
        name: "Register",
        component: () => import("./../pages/Auth/Register.vue"),
    },
    {
        path: "/forgotpassword",
        name: "ForgotPassword",
        component: () => import("./../pages/Auth/ForgotPassword.vue"),
    },
    {
        path: "/dashboard",
        name: "Dashboard",
        component: () => import("./../Layouts/DashboardLayout.vue"),
        meta: { requiresAuth: true },
        children: [
            {
                path: "",
                component: () => import("../pages/Dashboard.vue"),

            },
            {
                path: "/profile",
                name: "Profile",
                component: () => import("./../pages/Profile/Edit.vue"),
            },
            {
                path: "products",
                name: "Producuts",
                component: () => import("./../pages/Products/index.vue"),
            },
            {
                path: "addproduct",
                name: "AddProducut",
                component: () => import("./../pages/Products/Create.vue"),
            },
        ],
    },
    {
        path: "/:pathMatch(.*)*",
        component: () => import("./../pages/Notfound.vue"),
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

router.beforeEach((to,form,next)=>{

const isAuthenticated = sessionStorage.getItem('token'); // Replace with your actual auth logic

if (to.matched.some(record => record.meta.requiresAuth)) {
    if (!isAuthenticated) {
        next('/login');
    } else {
        next();
    }
} else {
    next();
}
})

export default router;
