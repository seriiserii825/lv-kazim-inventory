import EmployeeIndex from "./../pages/employee/Index.vue";
import EmployeeCreate from "./../pages/employee/Create.vue";
import EmployeeEdit from "./../pages/employee/Edit.vue";

const employeeRoutes = [
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
    },
];

export default employeeRoutes;
