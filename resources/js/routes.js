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
import SuppliersIndex from "./pages/suppliers/Index.vue";
import SuppliersCreate from "./pages/suppliers/Create.vue";
import SuppliersEdit from "./pages/suppliers/Edit.vue";
import MediaIndex from "./pages/media/Index.vue";
import MediaCreate from "./pages/media/Create.vue";
import MediaEdit from "./pages/media/Edit.vue";

const routes = {
    mode: "history",
    routes: [
        {
            path: "/",
            component: Home,
            name: "home",
        }, // auth
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
        }, // employee
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
        }, // suppliers
        {
            path: "/admin/suppliers/create",
            component: SuppliersCreate,
            name: "admin.suppliers.create",
        },
        {
            path: "/admin/suppliers/edit/:id",
            component: SuppliersEdit,
            name: "admin.suppliers.edit",
        },
        {
            path: "/admin/suppliers",
            component: SuppliersIndex,
            name: "admin.suppliers",
        }, // media
        {
            path: "/admin/media/create",
            component: MediaCreate,
            name: "admin.media.create",
        },
        {
            path: "/admin/media/edit/:id",
            component: MediaEdit,
            name: "admin.media.edit",
        },
        {
            path: "/admin/media",
            component: MediaIndex,
            name: "admin.media",
        }, //404
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
