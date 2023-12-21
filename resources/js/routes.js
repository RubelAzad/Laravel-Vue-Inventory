

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
//designation component
import AddShiftComponent from "./components/shift/create.vue";
import ListShiftComponent from "./components/shift/index.vue";
import EditShiftComponent from "./components/shift/edit.vue";




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

  ]
