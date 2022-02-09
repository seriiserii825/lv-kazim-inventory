import SuppliersIndex from "./../pages/suppliers/Index.vue";
import SuppliersCreate from "./../pages/suppliers/Create.vue";
import SuppliersEdit from "./../pages/suppliers/Edit.vue";

const suppliersRoutes = [
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
    },
];

export default suppliersRoutes;
