import CategoryIndex from "./../pages/categories/Index.vue";
import CategoryCreate from "./../pages/categories/Create.vue";
import CategoryEdit from "./../pages/categories/Edit.vue";

const categoriesRoutes = [
    {
        path: "/admin/categories/create",
        component: CategoryCreate,
        name: "admin.categories.create",
    },
    {
        path: "/admin/categories/edit/:id",
        component: CategoryEdit,
        name: "admin.categories.edit",
    },
    {
        path: "/admin/categories",
        component: CategoryIndex,
        name: "admin.categories",
    },
];

export default categoriesRoutes;
