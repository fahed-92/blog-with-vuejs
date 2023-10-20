import Vue from 'vue';
import VueRouter from "vue-router";

Vue.use(VueRouter);

import Post from "../components/Posts";
import PostDetails from "../components/PostDetails";
import CategoryPosts from "../components/CategoryPosts";
import Login from "../components/Login";
import Register from "../components/Register";
import GlobalHeader from "../components/GlobalHeader.vue";
import AdminIndex from "../components/admin/AdminIndex.vue";
import AdminPosts from "../components/admin/AdminPosts.vue";
import SinglePost from "../components/admin/SinglePost";
import AllNotifications from "../components/AllNotifications.vue";

const routes = [
    {path: '/', component: Post},
    {path: '/', component: GlobalHeader},
    {path: '/post/:slug', component: PostDetails},
    {path: '/category/:slug/posts', component: CategoryPosts},
    {path: '/register', component: Register},
    {path: '/login', component: Login},
    {path: '/admin', component: AdminIndex},
    {path: '/admin-posts', component: AdminPosts},
    {path: '/posts/:slug', component: SinglePost},
    { path: '/notifications', component: AllNotifications, name: 'allNotifications' },

]

const router = new VueRouter({
    el: '#app',
    routes,
    hashbang: false,
    mode: 'history'
});

export default router;
