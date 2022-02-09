import ProductIndex from "./../pages/products/Index.vue";
import ProductCreate from "./../pages/products/Create.vue";
import ProductEdit from "./../pages/products/Edit.vue";

const productRoutes = [
    {
        path: "/admin/products/create",
        component: ProductCreate,
        name: "admin.products.create",
    },
    {
        path: "/admin/products/edit/:id",
        component: ProductEdit,
        name: "admin.products.edit",
    },
    {
        path: "/admin/products",
        component: ProductIndex,
        name: "admin.products",
    },
];

export default productRoutes;
