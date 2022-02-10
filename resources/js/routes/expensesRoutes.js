import ExpenseIndex from "./../pages/expenses/Index.vue";
import ExpenseCreate from "./../pages/expenses/Create.vue";
import ExpenseEdit from "./../pages/expenses/Edit.vue";

const expensesRoutes = [
    {
        path: "/admin/expenses/create",
        component: ExpenseCreate,
        name: "admin.expenses.create",
    },
    {
        path: "/admin/expenses/edit/:id",
        component: ExpenseEdit,
        name: "admin.expenses.edit",
    },
    {
        path: "/admin/expenses",
        component: ExpenseIndex,
        name: "admin.expenses",
    },
];

export default expensesRoutes;
