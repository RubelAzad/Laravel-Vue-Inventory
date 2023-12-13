

import LoginComponent from "./components/auth/login.vue";
import RegisterComponent from "./components/auth/register.vue";
import ForgetComponent from "./components/auth/forget.vue";



export const routes = [
    { path: '/login', component:LoginComponent,name:'login' },
    { path: '/register', component:RegisterComponent,name:'register' },
    { path: '/forget', component:ForgetComponent,name:'forget' },
  ]
