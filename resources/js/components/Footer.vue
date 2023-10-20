<template>
    <div>
        <header class="navigation">
            <div class="header-top ">
                <div class="container" >
                    <div class="row justify-content-between align-items-center">
                        <div class="col-lg-2 col-md-4">
                            <div class="header-top-socials text-center text-lg-left text-md-left">
                                <a href="https://www.facebook.com/themefisher" target="_blank"><i
                                    class="ti-facebook"></i></a>
                                <a href="https://twitter.com/themefisher" target="_blank"><i class="ti-twitter"></i></a>
                                <a href="https://github.com/themefisher/" target="_blank"><i class="ti-github"></i></a>
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
                        <ul class="navbar-nav ml-auto">

                            <li class="nav-item"><router-link class="nav-link" :to="'/admin'" >Admin</router-link></li>

                            <li class="nav-item active">
                                <router-link class="nav-link" to="/" :key="$route.fullPath">Home <span class="sr-only">(current)</span></router-link>
                            </li>
                            <li class="nav-item dropdown">
                                <router-link class="nav-link dropdown-toggle" to="#" id="dropdown03" data-toggle="dropdown"
                                             aria-haspopup="true" aria-expanded="false">About</router-link>
                                <ul class="dropdown-menu" aria-labelledby="dropdown03">
                                    <li><router-link class="dropdown-item" to="about.html">Our company</router-link></li>
                                    <li><router-link class="dropdown-item" to="pricing.html">Pricing</router-link></li>
                                </ul>
                            </li>
                            <li class="nav-item"><router-link class="nav-link" to="service.html">Services</router-link></li>
                            <li class="nav-item"><router-link class="nav-link" to="project.html">Portfolio</router-link></li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="dropdown05" data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false">Blog</a>
                                <ul class="dropdown-menu" aria-labelledby="dropdown05">
                                    <li><router-link class="dropdown-item" to="blog-grid.html">Blog Grid</router-link></li>
                                    <li><router-link class="dropdown-item" to="blog-sidebar.html">Blog with Sidebar</router-link></li>

                                    <li><router-link class="dropdown-item" to="blog-single.html">Blog Single</router-link></li>
                                </ul>
                            </li>
                            <li class="nav-item"><router-link class="nav-link" to="contact.html">Contact</router-link></li>
                            <li class="nav-item">
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
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
    </div>

</template>

<script>
export default {
    name: "Header"
}
</script>

<style scoped>

</style>
