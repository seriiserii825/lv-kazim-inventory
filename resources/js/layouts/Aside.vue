<template>
    <el-aside width="200px">
        <el-menu :default-openeds="['1']">
            <el-menu-item index="1">
                <router-link :to="{ name: 'admin.index' }" exact>
                    <i class="el-icon-s-shop"></i>
                    <span>Dashboard</span>
                </router-link>
            </el-menu-item>
            <el-submenu index="2">
                <template slot="title"
                ><i class="el-icon-s-check"></i>Employee(Worker)
                </template>
                <el-menu-item-group>
                    <el-menu-item index="2-1">
                        <router-link :to="{ name: 'admin.employee.create' }">
                            <i class="el-icon-document-add"></i>
                            <span>Create</span>
                        </router-link>
                    </el-menu-item>
                    <el-menu-item index="2-2">
                        <router-link :to="{ name: 'admin.employee' }" exact>
                            <i class="el-icon-tickets"></i>
                            <span>List</span>
                        </router-link>
                    </el-menu-item>
                </el-menu-item-group>
            </el-submenu>

            <el-submenu index="3">
                <template slot="title"
                ><i class="el-icon-s-goods"></i>Suppliers(Provider)
                </template>
                <el-menu-item-group>
                    <el-menu-item index="3-1">
                        <router-link :to="{ name: 'admin.suppliers.create' }">
                            <i class="el-icon-document-add"></i>
                            <span>Create</span>
                        </router-link>
                    </el-menu-item>
                    <el-menu-item index="3-2">
                        <router-link :to="{ name: 'admin.suppliers' }" exact>
                            <i class="el-icon-tickets"></i>
                            <span>List</span>
                        </router-link>
                    </el-menu-item>
                </el-menu-item-group>
            </el-submenu>
            <el-submenu index="4">
                <template slot="title"
                ><i class="el-icon-s-unfold"></i>Categories
                </template>
                <el-menu-item-group>
                    <el-menu-item index="4-1">
                        <router-link :to="{ name: 'admin.categories.create' }">
                            <i class="el-icon-document-add"></i>
                            <span>Create</span>
                        </router-link>
                    </el-menu-item>
                    <el-menu-item index="4-2">
                        <router-link :to="{ name: 'admin.categories' }" exact>
                            <i class="el-icon-tickets"></i>
                            <span>List</span>
                        </router-link>
                    </el-menu-item>
                </el-menu-item-group>
            </el-submenu>
            <el-submenu index="5">
                <template slot="title"
                ><i class="el-icon-s-shop"></i>Products
                </template>
                <el-menu-item-group>
                    <el-menu-item index="5-1">
                        <router-link :to="{ name: 'admin.products.create' }">
                            <i class="el-icon-document-add"></i>
                            <span>Create</span>
                        </router-link>
                    </el-menu-item>
                    <el-menu-item index="5-2">
                        <router-link :to="{ name: 'admin.products' }" exact>
                            <i class="el-icon-tickets"></i>
                            <span>List</span>
                        </router-link>
                    </el-menu-item>
                </el-menu-item-group>
            </el-submenu>
            <el-submenu index="6">
                <template slot="title"
                ><i class="el-icon-s-help"></i>Expenses
                </template>
                <el-menu-item-group>
                    <el-menu-item index="6-1">
                        <router-link :to="{ name: 'admin.expenses.create' }">
                            <i class="el-icon-document-add"></i>
                            <span>Create</span>
                        </router-link>
                    </el-menu-item>
                    <el-menu-item index="6-2">
                        <router-link :to="{ name: 'admin.expenses' }" exact>
                            <i class="el-icon-tickets"></i>
                            <span>List</span>
                        </router-link>
                    </el-menu-item>
                </el-menu-item-group>
            </el-submenu>
            <el-submenu index="7">
                <template slot="title"><i class="el-icon-s-help"></i>Salary</template>
                <el-menu-item-group>
                    <el-menu-item index="7-1">
                        <router-link :to="{ name: 'admin.salaries.create' }">
                            <i class="el-icon-document-add"></i>
                            <span>Create</span>
                        </router-link>
                    </el-menu-item>
                    <el-menu-item index="7-2">
                        <router-link :to="{ name: 'admin.salaries' }" exact>
                            <i class="el-icon-tickets"></i>
                            <span>List</span>
                        </router-link>
                    </el-menu-item>
                </el-menu-item-group>
            </el-submenu>
            <el-submenu index="8">
                <template slot="title"
                ><i class="el-icon-s-custom"></i>Customers
                </template
                >
                <el-menu-item-group>
                    <el-menu-item index="8-1">
                        <router-link :to="{ name: 'admin.customers.create' }">
                            <i class="el-icon-document-add"></i>
                            <span>Create</span>
                        </router-link>
                    </el-menu-item>
                    <el-menu-item index="8-2">
                        <router-link :to="{ name: 'admin.customers' }" exact>
                            <i class="el-icon-tickets"></i>
                            <span>List</span>
                        </router-link>
                    </el-menu-item>
                </el-menu-item-group>
            </el-submenu>
            <el-submenu index="9">
                <template slot="title"><i class="el-icon-s-custom"></i>Orders</template>
                <el-menu-item-group>
                    <el-menu-item index="9-1">
                        <router-link :to="{ name: 'admin.index' }">
                            <i class="el-icon-document-add"></i>
                            <span>Create</span>
                        </router-link>
                    </el-menu-item>
                    <el-menu-item index="9-2">
                        <router-link :to="{ name: 'admin.orders' }" exact>
                            <i class="el-icon-tickets"></i>
                            <span>List</span>
                        </router-link>
                    </el-menu-item>
                </el-menu-item-group>
            </el-submenu>
            <el-submenu index="10">
                <template slot="title"><i class="el-icon-s-custom"></i>Sale</template>
                <el-menu-item-group>
                    <el-menu-item index="10-2">
                        <router-link :to="{ name: 'admin.sales' }" exact>
                            <i class="el-icon-tickets"></i>
                            <span>List</span>
                        </router-link>
                    </el-menu-item>
                </el-menu-item-group>
            </el-submenu>
            <el-submenu index="11">
                <template slot="title"><i class="el-icon-s-custom"></i>Csv</template>
                <el-menu-item-group>
                    <el-menu-item index="11-2">
                        <router-link :to="{ name: 'admin.csv' }" exact>
                            <i class="el-icon-tickets"></i>
                            <span>List</span>
                        </router-link>
                    </el-menu-item>
                </el-menu-item-group>
            </el-submenu>
            <el-submenu index="12">
                <template slot="title"><i class="el-icon-s-custom"></i>Orders</template>
                <el-menu-item-group>
                    <el-menu-item index="12-2">
                        <router-link :to="{ name: 'admin.orders' }" exact>
                            <i class="el-icon-tickets"></i>
                            <span>List</span>
                        </router-link>
                    </el-menu-item>
                </el-menu-item-group>
            </el-submenu>
        </el-menu>
    </el-aside>
</template>
<style lang="scss">
.el-aside {
    min-height: 300vh;
    background-color: #333;
    .el-menu {
        background-color: #333;
        border: none;
        li {
            padding: 0 !important;
            transition: all 0.4s;
            background-color: #003546;
            &:hover {
                background-color: lighten(#003546, 10%);
            }
            a {
                display: block;
                padding: 0 2rem;
                text-decoration: none;
                color: white;
                &.router-link-exact-active {
                    background-color: #a1a100;
                }
            }
            .el-submenu__title {
                color: white;
                &:hover {
                    background: inherit;
                }
            }
            ul {
                li {
                    background-color: darken(#003546, 5%);
                }
            }
        }
        .el-submenu.is-opened {
            .el-submenu__title {
                background-color: #a1a100;
            }
        }
    }
}
</style>
