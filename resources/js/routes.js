

import LoginComponent from "./components/auth/login.vue";
import RegisterComponent from "./components/auth/register.vue";
import ForgetComponent from "./components/auth/forget.vue";
import HomeComponent from "./components/home.vue";
import LogoutComponent from "./components/auth/logout.vue";
import AddEmployeeComponent from "./components/employee/create.vue";
import EmployeeListComponent from "./components/employee/index.vue";



export const routes = [
    { path: '/', component:LoginComponent,name:'/' },
    { path: '/register', component:RegisterComponent,name:'register' },
    { path: '/forget-password', component:ForgetComponent,name:'forget-password' },
    { path: '/home', component:HomeComponent,name:'home' },
    { path: '/logout', component:LogoutComponent,name:'logout' },
    { path: '/add-employee', component:AddEmployeeComponent,name:'add-employee' },
    { path: '/all-employee', component:EmployeeListComponent,name:'all-employee' },
  ]
