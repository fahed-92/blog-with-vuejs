<template>
    <div class="row">
        <div class="col-lg-8">
            <div class="row justify-content-center">
                <div class="row justify-content-center">

                    <div class="col-lg-4 col-md-6 mb-5" v-for="post in posts" :key="post.id">
                        <div class="card bg-transparent border-0">
                            <img :src="post.image" alt="" class="img-fluid rounded">
                            <div class="card-body mt-2 text-center">
                                <div class="blog-item-meta">
                                    <a href="#" class="text-white-50"><i class="fa fa-adjust mr-2" v-if="post.category"></i>Category :{{ post.category.name }}</a><br>
                                    <a href="#" class="text-white-50"><i class="fa fa-comment mr-2"></i>Comments :{{ post.comments_counts }}</a><br>
                                    <a href="#" class="text-white-50 ml-2"><i class="fa fa-user mr-2" v-if="post.user"></i>Author :{{ post.user.name }}</a>
                                </div>

                                <router-link :to="'/post/' + post.slug "><h3 class="mt-3 mb-5 lh-36 text-white">{{ post.title }}</h3></router-link>
                                <!--                        <a :href="'/posts/' + post.slug" class="text-white ">{{post.title }}</a>-->

                                <router-link :to="'/post/' + post.slug ">
                                    <a href="" class="btn btn-small btn-solid-border btn-round-full text-white">
                                        Learn More
                                    </a>
                                </router-link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="sidebar-wrap">
                <div class="sidebar-widget search card p-4 mb-3 border-0">
                    <input type="text" class="form-control" placeholder="search">
                    <a href="#" class="btn btn-mian btn-small d-block mt-2">search</a>
                </div>
                <div class="sidebar-widget latest-post card border-0 p-4 mb-3">
                    <h5>Latest Posts</h5>

                    <div class="media border-bottom py-3">
                        <a href="#"><img class="mr-4" src="assets/images/blog/bt-3.jpg" alt=""></a>
                        <div class="media-body">
                            <h6 class="my-2"><a href="#">Thoughtful living in los Angeles</a></h6>
                            <span class="text-sm text-muted">03 Mar 2018</span>
                        </div>
                    </div>

                    <div class="media border-bottom py-3">
                        <a href="#"><img class="mr-4" src="assets/images/blog/bt-2.jpg" alt=""></a>
                        <div class="media-body">
                            <h6 class="my-2"><a href="#">Vivamus molestie gravida turpis.</a></h6>
                            <span class="text-sm text-muted">03 Mar 2018</span>
                        </div>
                    </div>

                    <div class="media py-3">
                        <a href="#"><img class="mr-4" src="assets/images/blog/bt-1.jpg" alt=""></a>
                        <div class="media-body">
                            <h6 class="my-2"><a href="#">Fusce lobortis lorem at ipsum semper sagittis</a>
                            </h6>
                            <span class="text-sm text-muted">03 Mar 2018</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>



</template>

<script>
export default {
    mounted() {
        console.log('Component mounted.')
        this.getPosts();
    },
    data() {
        return {
            posts: []
        }
    },
    methods: {
        getPosts() {
            axios.get('/api/category/' + this.$route.params.slug + '/posts')
                .then(res => {
                    this.posts = res.data
                })
                .then(err => {
                    console.log(err)
                })
        }
    }
}
</script>
