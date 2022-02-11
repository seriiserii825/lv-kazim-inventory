import SalaryIndex from "./../pages/salaries/Index.vue";
import SalaryCreate from "./../pages/salaries/Create.vue";
import SalaryEdit from "./../pages/salaries/Edit.vue";
import SalaryMonth from "./../pages/salaries/Month.vue";
import SalaryMonthSingle from "./../pages/salaries/MonthSingle.vue";

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
    {
        path: "/admin/salaries/month",
        component: SalaryMonth,
        name: "admin.salaries.month",
    },
    {
        path: "/admin/salaries/month/:month",
        component: SalaryMonthSingle,
        name: "admin.salaries.month.single",
    },
];

export default salariesRoutes;
