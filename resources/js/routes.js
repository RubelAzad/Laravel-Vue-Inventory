

import LoginComponent from "./components/auth/login.vue";
import RegisterComponent from "./components/auth/register.vue";
import ForgetComponent from "./components/auth/forget.vue";
import HomeComponent from "./components/home.vue";
import LogoutComponent from "./components/auth/logout.vue";



export const routes = [
    { path: '/login', component:LoginComponent,name:'login' },
    { path: '/register', component:RegisterComponent,name:'register' },
    { path: '/forget', component:ForgetComponent,name:'forget' },
    { path: '/home', component:HomeComponent,name:'home' },
    { path: '/logout', component:LogoutComponent,name:'logout' },
  ]
