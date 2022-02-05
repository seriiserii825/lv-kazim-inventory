<template>
  <el-aside width="200px" style="background-color: rgb(238, 241, 246)">
    <el-menu :default-openeds="['1']">
      <el-menu-item index="1">
        <router-link :to="{ name: 'admin.index' }" exact>
          <i class="el-icon-s-shop"></i>
          <span>Dashboard</span>
        </router-link>
      </el-menu-item>

      <el-submenu index="2">
        <template slot="title"
          ><i class="el-icon-s-check"></i>Employee</template
        >
        <el-menu-item-group>
          <el-menu-item index="1-1">
            <router-link :to="{ name: 'admin.employee.create' }">
              <i class="el-icon-document-add"></i>
              <span>Create</span>
            </router-link>
          </el-menu-item>
          <el-menu-item index="1-2">
            <router-link :to="{ name: 'admin.employee' }" exact>
              <i class="el-icon-tickets"></i>
              <span>List</span>
            </router-link>
          </el-menu-item>
        </el-menu-item-group>
      </el-submenu>
    </el-menu>
  </el-aside>
</template>