import CustomerIndex from "./../pages/customers/Index.vue";
import CustomerCreate from "./../pages/customers/Create.vue";
import CustomerEdit from "./../pages/customers/Edit.vue";

const customersRoutes = [
    {
        path: "/admin/customers/create",
        component: CustomerCreate,
        name: "admin.customers.create",
    },
    {
        path: "/admin/customers/edit/:id",
        component: CustomerEdit,
        name: "admin.customers.edit",
    },
    {
        path: "/admin/customers",
        component: CustomerIndex,
        name: "admin.customers",
    },
];

export default customersRoutes;
