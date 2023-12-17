import { createApp } from "vue";
import { createRouter, createWebHistory } from "vue-router";
import { routes } from "./routes";
import VueSweetalert2 from "vue-sweetalert2";
import "sweetalert2/dist/sweetalert2.min.css";

//import user class

import User from './Helper/User';
window.User = User

const app = createApp({
    el: "#app",
});

const router = createRouter({
    history: createWebHistory(),
    routes,
});


app.use(router);
app.use(VueSweetalert2);

app.mount("#app");
