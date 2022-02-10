import authRoutes from "./routes/authRoute";
import employeeRoutes from "./routes/employeeRoutes";
import NotFound from "./pages/NotFound.vue";
import suppliersRoutes from "./routes/suppliersRoutes";
import categoriesRoutes from "./routes/categoriesRoutes";
import mediaRoutes from "./routes/mediaRoutes";
import productRoutes from "./routes/productsRoutes";
import expensesRoutes from "./routes/expensesRoutes";
import salariesRoutes from "./routes/salariesRoutes";

const routes = {
    mode: "history",
    routes: [
        ...authRoutes,
        ...employeeRoutes,
        ...suppliersRoutes,
        ...categoriesRoutes,
        ...mediaRoutes,
        ...productRoutes,
        ...expensesRoutes,
        ...salariesRoutes,
        { path: "/404", name: "404", component: NotFound },
        { path: "*", redirect: "/404" },
    ],
};
export default routes;
