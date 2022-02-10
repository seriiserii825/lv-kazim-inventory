import SalaryIndex from "./../pages/salaries/Index.vue";
import SalaryCreate from "./../pages/salaries/Create.vue";
import SalaryEdit from "./../pages/salaries/Edit.vue";

const salariesRoutes = [
    {
        path: "/admin/salaries/create",
        component: SalaryCreate,
        name: "admin.salaries.create",
    },
    {
        path: "/admin/salaries/edit/:id",
        component: SalaryEdit,
        name: "admin.salaries.edit",
    },
    {
        path: "/admin/salaries",
        component: SalaryIndex,
        name: "admin.salaries",
    },
];

export default salariesRoutes;
