/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import Vue from "vue";

require('./bootstrap');

window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('posts', require('./components/Posts.vue').default);
Vue.component('global-home', require('./components/GlobalHome.vue').default);
Vue.component('categories', require('./components/Categories.vue').default);
Vue.component('pagination', require('laravel-vue-pagination'));
Vue.component('register', require('./components/Register.vue').default);
Vue.component('login', require('./components/Login.vue').default)
Vue.component('global-header', require('./components/GlobalHeader.vue').default)
Vue.component('admin-index', require('./components/admin/AdminIndex.vue').default)
Vue.component('admin-posts', require('./components/admin/AdminPosts.vue').default)
Vue.component('single-post', require('./components/admin/SinglePost.vue').default)
Vue.component('edit-post', require('./components/admin/EditPost.vue').default)
// Vue.component('notification-bar', require('./components/NotificationBar').default)

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import router from "./routes/routes";
import Vuex from 'vuex';

Vue.use(Vuex);

const store = new Vuex.Store({
    state: {
        userToken: null,
        user: null,
        is_admin: null,
        EditedPost: {},
        notifications: []
    },
    getters: {
        isLogged(state) {
            return !!state.userToken;
        },
        isAdmin(state) {
            if(state.user){
                return state.user.is_admin
            }
            return null
        },
        PostToEdit(state){
            return state.EditedPost
        }
    },
    mutations: {
        setUserToken(state, userToken) {
            state.userToken = userToken;
            localStorage.setItem('userToken', JSON.stringify(userToken));
            axios.defaults.headers.common.Authorization = `Bearer ${userToken}`
        },
        setIsAdmin(state, is_admin) {
            state.is_admin = is_admin;
            localStorage.setItem('is_admin', JSON.stringify(state.is_admin));

        },
        setUser(state, user) {
            state.user = user;
            Echo.connector.pusher.config.auth.headers.Authorization = `Bearer ${state.userToken}`;
            console.log('done')
            Echo.private('App.Models.User.' + state.user.id)
                .notification((notification) => {
                    console.log('notify' + notification);
                    state.notifications.unshift(notification);
                });
        },
        removeUserToken(state) {
            state.userToken = null;
            localStorage.removeItem('userToken');
            window.location.pathname = '/';
        },
        logout(state) {
            state.userToken = null;
            localStorage.removeItem('userToken');
            localStorage.removeItem('user');
            localStorage.removeItem('is_admin');
            window.location.pathname = '/';

        },
        EditPost(state, post) {
            state.EditedPost = post
        }
    },
    actions: {
        RegisterUser({commit}, payload) {
            axios.post('/api/register', payload)
                .then(res => {
                    // console.log(res)
                    // Store the user in the state
                    commit('setUserToken', res.data.token)
                    commit('setIsAdmin', res.data.user.is_admin);

                    // Store the user in the state
                    // commit('setUser', res.data.user);
                })
                .catch(err => {
                    console.log(err)
                })
        },
        LoginUser({commit}, payload) {
            axios.post('/api/login', payload)
                .then(res => {
                    // console.log(res)
                    // this.$router.go('/home')
                    // Store the user in the state
                    commit('setUserToken', res.data.token)
                    // Store the user in the state
                    // commit('setUser', res.data.user);
                    axios.get('/api/user', this.userToken)
                        .then(res => {
                            // console.log(res)
                            // // Store the user in the state
                            // commit('setUserToken', res.data.token)
                            // // Store the user in the state
                            commit('setUser', res.data.user);
                            commit('setIsAdmin', res.data.user.is_admin);

                            // Redirect to a protected route (e.g., dashboard)
                            // router.push('/');
                        })
                        .catch(err => {
                            console.log(err)
                        })

                })
                .catch(err => {
                    console.log(err)
                })
        },
        // setUser({commit} ,token) {
        //     token = this.state.userToken
        //     axios.get('/api/user',token)
        //         .then(res => {
        //             console.log(res.data.user.is_admin)
        //             // // Store the user in the state
        //             // commit('setUserToken', res.data.token)
        //             // // Store the user in the state
        //             // commit('setUser', res.data.user);
        //             commit('setIsAdmin', res.data.user.is_admin);
        //
        //             // Redirect to a protected route (e.g., dashboard)
        //             // router.push('/');
        //         })
        //         .catch(err => {
        //             console.log(err)
        //         })
        // },
    },

})
const app = new Vue({
    mode: 'history',
    el: '#app',
    router: router,
    store: store,
});
