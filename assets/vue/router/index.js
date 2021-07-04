import { createRouter, createWebHistory } from "vue-router";
import Home from "../views/Home";

export default createRouter({
  history: createWebHistory(),
  routes: [
    { path: "/home", component: Home },
    { path: '/:pathMatch(.*)*', redirect: "/home" }
  ]
});