import Admin from "./pages/Admin.vue";
import Register from "./pages/Register.vue";
import Login from "./pages/Login.vue";
import ForgotPassword from "./pages/ForgotPassword.vue";
import Home from "./pages/Home.vue";
import NotFound from "./pages/NotFound.vue";
import Logout from "./pages/Logout.vue";
import EmployeeIndex from "./pages/employee/Index.vue";
import EmployeeCreate from "./pages/employee/Create.vue";
import EmployeeEdit from "./pages/employee/Edit.vue";

const routes = {
    mode: "history",
    routes: [
        {
            path: "/",
            component: Home,
            name: "home",
        },
        {
            path: "/admin",
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
            path: "/logout",
            component: Logout,
            name: "logout",
        },
        {
            path: "/forgot-password",
            component: ForgotPassword,
            name: "forgot-password",
        },
        {
            path: "/admin/employee/create",
            component: EmployeeCreate,
            name: "admin.employee.create",
        },
        {
            path: "/admin/employee/edit/:id",
            component: EmployeeEdit,
            name: "admin.employee.edit",
        },
        {
            path: "/admin/employee",
            component: EmployeeIndex,
            name: "admin.employee",
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
