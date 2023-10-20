<template>
    <div>
        <header class="navigation">
            <div class="header-top ">
                <div class="container">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-lg-2 col-md-4">
                            <div class="header-top-socials text-center text-lg-left text-md-left">
                                <a href="https://www.facebook.com/FahedAljghamy" target="_blank"><i
                                    class="ti-facebook"></i></a>
                                <a href="https://twitter.com/FAljghamy" target="_blank"><i class="ti-twitter"></i></a>
                                <a href="https://github.com/fahed-92" target="_blank"><i class="ti-github"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-10 col-md-8 text-center text-lg-right text-md-right">
                            <div class="header-top-info">
                                <a href="tel:+971-50-18 20792">Call Us : <span>+971-50-18 20792</span></a>
                                <a href="fahed9285t@gmail.com"><i class="fa fa-envelope mr-2"></i><span>fahed9285t@gmail.com</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <nav class="navbar navbar-expand-lg  py-4" id="navbar">
                <div class="container">
                    <a class="navbar-brand" href="#">
                        Fahed<span>.DEV</span>
                    </a>

                    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
                            data-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false"
                            aria-label="Toggle navigation">
                        <span class="fa fa-bars"></span>
                    </button>

                    <div class="collapse navbar-collapse text-center" id="navbarsExample09">
                        <notificationBar/>

                        <ul class="navbar-nav ml-auto">
                                <li class="nav-item" v-if="isAdmin">
                                    <router-link class="nav-link" :to="'/admin'">Admin</router-link>
                                </li>

                            <li class="nav-item active">
                                <router-link class="nav-link" :to="'/'">Home <span class="sr-only">(current)</span>
                                </router-link>
                            </li>

                            <li class="nav-item" v-if="user">
                                {{ user.name }}
                            </li>


                            <li class="nav-item" v-if="!isLogged">
                                <ul class="navbar-nav ms-auto">
                                    <!-- Authentication Links -->

                                    <li class="nav-item">
                                        <router-link class="nav-link" to="/login">Login</router-link>
                                    </li>

                                    <li class="nav-item">
                                        <router-link class="nav-link" to="/register">Register</router-link>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item" v-if="isLogged">
                                <ul class="navbar-nav ms-auto">

                                    <li class="nav-link" @click.stop="logout">
                                        Logout
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
    </div>
</template>

<script>
import notificationBar from "./NotificationBar";
export default {
    name: "GlobalHeader",
    mounted() {
        const userToken = localStorage.getItem('userToken');
        if (userToken) {
            // Perform a user re-authentication if necessary.
            // Then commit the user information to your store.
            this.$store.commit('setUser', {token: userToken});
        }
        const is_admin = localStorage.getItem('is_admin');
        if (is_admin) {
            // Perform a user re-authentication if necessary.
            // Then commit the user information to your store.
            this.$store.commit('setIsAdmin', is_admin);
        }


    },
    data(){
      return{
          user: {},
          is_admin:''
      }
    },
    created() {
        this.updateToken()
        this.updateIsAdmin()
        this.UpdateUser()
    },
    components:{
        notificationBar
    },
    computed: {
        isLogged() {
            return this.$store.getters.isLogged
        },
        isUser() {
            if (this.isLogged) {
                return this.$store.getters.isUser
            }else {
                console.log(fail)
            }
        },
        isAdmin() {
            return this.$store.getters.isAdmin
        }
    },
    methods:{
        updateToken() {
            let token = JSON.parse(localStorage.getItem('userToken'));
            this.$store.commit('setUserToken', token)
        },
        updateIsAdmin() {
            let is_admin = JSON.parse(localStorage.getItem('is_admin'));
            this.is_admin = is_admin
            this.$store.commit('setIsAdmin', is_admin)
        },
        UpdateUser(){
            if (this.isLogged){
                let user = JSON.parse(localStorage.getItem('user'));
                this.user = user
                this.$store.commit('setUser', user)
            }
        },
        logout(){
            this.$store.commit('logout')

        }
    }
}
</script>
