import OrderIndex from "./../pages/orders/Index.vue";
import OrderSingle from "./../pages/orders/Single.vue";

const ordersRoutes = [
    {
        path: "/admin/orders",
        component: OrderIndex,
        name: "admin.orders",
    },
    {
        path: "/admin/orders/single/:id",
        component: OrderSingle,
        name: "admin.orders.single",
    },
];

export default ordersRoutes;
