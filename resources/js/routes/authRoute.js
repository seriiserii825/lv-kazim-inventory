import Admin from "./../pages/Admin.vue";
import Register from "./../pages/Register.vue";
import Login from "./../pages/Login.vue";
import ForgotPassword from "./../pages/ForgotPassword.vue";
import Logout from "./../pages/Logout.vue";
import Home from "./../pages/Home.vue";

const authRoutes = [
    { path: "/", component: Home, name: "home" }, // auth
    { path: "/admin", component: Admin, name: "admin.index" },
    { path: "/register", component: Register, name: "register" },
    { path: "/login", component: Login, name: "login" },
    { path: "/logout", component: Logout, name: "logout" },
    {
        path: "/forgot-password",
        component: ForgotPassword,
        name: "forgot-password",
    },
];

export default authRoutes;
