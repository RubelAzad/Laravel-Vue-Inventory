

import LoginComponent from "./components/auth/login.vue";
import RegisterComponent from "./components/auth/register.vue";
import ForgetComponent from "./components/auth/forget.vue";
import HomeComponent from "./components/home.vue";
import LogoutComponent from "./components/auth/logout.vue";

//employee component
import AddEmployeeComponent from "./components/employee/create.vue";
import EmployeeListComponent from "./components/employee/index.vue";
import EditEmployeeComponent from "./components/employee/edit.vue";

//department component
import AddDepartmentComponent from "./components/department/create.vue";
import ListDepartmentComponent from "./components/department/index.vue";
import EditDepartmentComponent from "./components/department/edit.vue";

//designation component
import AddDesignationComponent from "./components/designation/create.vue";
import ListDesignationComponent from "./components/designation/index.vue";
import EditDesignationComponent from "./components/designation/edit.vue";
//designation component
import AddBranchComponent from "./components/branch/create.vue";
import ListBranchComponent from "./components/branch/index.vue";
import EditBranchComponent from "./components/branch/edit.vue";
//Shift component
import AddShiftComponent from "./components/shift/create.vue";
import ListShiftComponent from "./components/shift/index.vue";
import EditShiftComponent from "./components/shift/edit.vue";
//Supplier component
import AddSupplierComponent from "./components/supplier/create.vue";
import ListSupplierComponent from "./components/supplier/index.vue";
import EditSupplierComponent from "./components/supplier/edit.vue";
//Category component
import AddCategoryComponent from "./components/category/create.vue";
import ListCategoryComponent from "./components/category/index.vue";
import EditCategoryComponent from "./components/category/edit.vue";
//Brand component
import AddBrandComponent from "./components/brand/create.vue";
import ListBrandComponent from "./components/brand/index.vue";
import EditBrandComponent from "./components/brand/edit.vue";
//Tax component
import AddTaxComponent from "./components/tax/create.vue";
import ListTaxComponent from "./components/tax/index.vue";
import EditTaxComponent from "./components/tax/edit.vue";
//Vat component
import AddVatComponent from "./components/vat/create.vue";
import ListVatComponent from "./components/vat/index.vue";
import EditVatComponent from "./components/vat/edit.vue";
//Unit component
import AddUnitComponent from "./components/unit/create.vue";
import ListUnitComponent from "./components/unit/index.vue";
import EditUnitComponent from "./components/unit/edit.vue";
//Warehouse component
import AddWarehouseComponent from "./components/warehouse/create.vue";
import ListWarehouseComponent from "./components/warehouse/index.vue";
import EditWarehouseComponent from "./components/warehouse/edit.vue";
//Product component
import AddProductComponent from "./components/product/create.vue";
import ListProductComponent from "./components/product/index.vue";
import EditProductComponent from "./components/product/edit.vue";




export const routes = [
    { path: '/', component:LoginComponent,name:'/' },
    { path: '/register', component:RegisterComponent,name:'register' },
    { path: '/forget-password', component:ForgetComponent,name:'forget-password' },
    { path: '/home', component:HomeComponent,name:'home' },
    { path: '/logout', component:LogoutComponent,name:'logout' },

    //employee
    { path: '/add-employee', component:AddEmployeeComponent,name:'add-employee' },
    { path: '/all-employee', component:EmployeeListComponent,name:'all-employee' },
    { path: '/edit-employee/:id', component:EditEmployeeComponent,name:'edit-employee' },

    //Department
    { path: '/add-department', component:AddDepartmentComponent,name:'add-department' },
    { path: '/all-department', component:ListDepartmentComponent,name:'all-department' },
    { path: '/edit-department/:id', component:EditDepartmentComponent,name:'edit-department' },
    //Designation
    { path: '/add-designation', component:AddDesignationComponent,name:'add-designation' },
    { path: '/all-designation', component:ListDesignationComponent,name:'all-designation' },
    { path: '/edit-designation/:id', component:EditDesignationComponent,name:'edit-designation' },

    //Branch
    { path: '/add-branch', component:AddBranchComponent,name:'add-branch' },
    { path: '/all-branch', component:ListBranchComponent,name:'all-branch' },
    { path: '/edit-branch/:id', component:EditBranchComponent,name:'edit-branch' },

    //Shift
    { path: '/add-shift', component:AddShiftComponent,name:'add-shift' },
    { path: '/all-shift', component:ListShiftComponent,name:'all-shift' },
    { path: '/edit-shift/:id', component:EditShiftComponent,name:'edit-shift' },

    //Supplier
    { path: '/add-supplier', component:AddSupplierComponent,name:'add-supplier' },
    { path: '/all-supplier', component:ListSupplierComponent,name:'all-supplier' },
    { path: '/edit-supplier/:id', component:EditSupplierComponent,name:'edit-supplier' },

    //Category
    { path: '/add-category', component:AddCategoryComponent,name:'add-category' },
    { path: '/all-category', component:ListCategoryComponent,name:'all-category' },
    { path: '/edit-category/:id', component:EditCategoryComponent,name:'edit-category' },
    //Brand
    { path: '/add-brand', component:AddBrandComponent,name:'add-brand' },
    { path: '/all-brand', component:ListBrandComponent,name:'all-brand' },
    { path: '/edit-brand/:id', component:EditBrandComponent,name:'edit-brand' },
    //Tax
    { path: '/add-tax', component:AddTaxComponent,name:'add-tax' },
    { path: '/all-tax', component:ListTaxComponent,name:'all-tax' },
    { path: '/edit-tax/:id', component:EditTaxComponent,name:'edit-tax' },
    //Vat
    { path: '/add-vat', component:AddVatComponent,name:'add-vat' },
    { path: '/all-vat', component:ListVatComponent,name:'all-vat' },
    { path: '/edit-vat/:id', component:EditVatComponent,name:'edit-vat' },
    //Unit
    { path: '/add-unit', component:AddUnitComponent,name:'add-unit' },
    { path: '/all-unit', component:ListUnitComponent,name:'all-unit' },
    { path: '/edit-unit/:id', component:EditUnitComponent,name:'edit-unit' },
    //Warehouse
    { path: '/add-warehouse', component:AddWarehouseComponent,name:'add-warehouse' },
    { path: '/all-warehouse', component:ListWarehouseComponent,name:'all-warehouse' },
    { path: '/edit-warehouse/:id', component:EditWarehouseComponent,name:'edit-warehouse' },
    //Product
    { path: '/add-product', component:AddProductComponent,name:'add-product' },
    { path: '/all-product', component:ListProductComponent,name:'all-product' },
    { path: '/edit-product/:id', component:EditProductComponent,name:'edit-product' },


  ]
