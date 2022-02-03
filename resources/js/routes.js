import Admin from "./pages/Admin.vue";
import Register from "./pages/Register.vue";
import Login from "./pages/Login.vue";
import NotFound from "./pages/NotFound.vue";

const routes = {
    mode: "history",
    routes: [
        {
            path: "/",
            component: Admin,
            name: "admin.index",
        },
        {
            path: "/register",
            component: Register,
            name: "register",
        },
        {
            path: "/login",
            component: Login,
            name: "login",
        },
        {
            path: "/404",
            name: "404",
            component: NotFound,
        },
        {
            path: "*",
            redirect: "/404",
        },
    ],
};
export default routes;
