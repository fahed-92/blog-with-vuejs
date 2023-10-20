<template>
    <div class="">

        <section class="page-title bg-1">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="block text-center">
                            <span class="text-white">News details</span>
                            <h1 class="text-capitalize mb-4 text-lg">Blog Single</h1>
                            <ul class="list-inline">
                                <li class="list-inline-item"><a href="index.html" class="text-white">Home</a></li>
                                <li class="list-inline-item"><span class="text-white">/</span></li>
                                <li class="list-inline-item"><a href="#" class="text-white-50">{{ post.title }}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section blog-wrap bg-gray">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-lg-12 mb-5">
                                <div class="single-blog-item">
                                    <div class="blog-item-content bg-white p-5">
                                        <img :src="post.image" alt="" class="img-fluid rounded mb-1">
                                        <div class="blog-item-meta bg-gray py-1 px-2 text-center">
                                            <span class="text-muted text-capitalize mr-3" v-if="post.user"><i
                                                class="ti-pencil-alt mr-2"></i>{{ post.user.name }}</span>
                                            <span class="text-muted text-capitalize mr-3"><i
                                                class="ti-comment mr-2"></i>{{ post.comments_counts }}Comments</span>
                                            <span class="text-black text-capitalize mr-3"><i class="ti-time mr-1"></i> {{
                                                    post.added_at
                                                }}</span>
                                        </div>

                                        <h2 class="mt-3 mb-4"><a href="#">{{ post.title }}</a>
                                        </h2>
                                        <p class="lead mb-4">{{ post.body }}</p>

                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 mb-5">
                                <div class="comment-area card border-0 p-5">
                                    <h4 class="mb-4">{{ comments.length }} : Comments</h4>
                                    <ul class="comment-tree list-unstyled">
                                        <li class="mb-5" v-for="(comment , index) in post.comments" :key="index">
                                            <div class="comment-area-box">
                                                <img alt="" v-if="comment.user" :src="comment.user.profile_img"
                                                     class="card-img img-fluid float-left mb-3 mr-2"
                                                     style="height: 2rem; width: 2rem; border-radius: 50%;">

                                                <h5 class="mb-1 mt-2" v-if="comment.user">{{ comment.user.name }}</h5>
                                                <div
                                                    class="comment-meta mt-4 mt-lg-0 mt-md-0 mb-3 float-lg-right float-md-right">
                                                    <a href="#"><i class="icofont-reply mr-2 text-muted"></i>Reply |</a>
                                                    <span class="date-comm">Posted At {{ comment.added_at }} </span>
                                                </div>
                                                <br>
                                                <div class="comment-content mt-3">
                                                    <p>{{ comment.body }}</p>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <form class="contact-form bg-white rounded p-5" id="comment-form">
                                    <h4 class="mb-4">Write a comment</h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input class="form-control hidden" type="hidden" name="" id=""
                                                       placeholder="Name:" v-model="post_id">
                                            </div>
                                        </div>
                                    </div>
                                    <textarea class="form-control mb-3" name="comment" id="comment" cols="30" rows="5"
                                              placeholder="Comment" v-model="body">
                                    </textarea>

                                    <input class="btn btn-main btn-round-full" type="submit" name="submit-contact"
                                           id="submit_contact" @click.prevent="addComment" value="Submit Message">
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="sidebar-wrap">
                            <div class="sidebar-widget search card p-4 mb-3 border-0">
                                <input type="text" class="form-control" placeholder="search">
                                <a href="#" class="btn btn-mian btn-small d-block mt-2">search</a>
                            </div>

                            <div class="sidebar-widget card border-0 mb-3">
                                <img v-if="post.user" :src="post.user.profile_img" alt="" class="img-fluid">
                                <div class="card-body p-4 text-center" v-if="post.user">
                                    <h5 class="mb-0 mt-4">{{ post.user.name }}</h5>
                                    <p>Digital Marketer</p>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt, dolore.</p>

                                    <ul class="list-inline author-socials">
                                        <li class="list-inline-item mr-3">
                                            <a href="#"><i class="fab fa-facebook-f text-muted"></i></a>
                                        </li>
                                        <li class="list-inline-item mr-3">
                                            <a href="#"><i class="fab fa-twitter text-muted"></i></a>
                                        </li>
                                        <li class="list-inline-item mr-3">
                                            <a href="#"><i class="fab fa-linkedin-in text-muted"></i></a>
                                        </li>
                                        <li class="list-inline-item mr-3">
                                            <a href="#"><i class="fab fa-pinterest text-muted"></i></a>
                                        </li>
                                        <li class="list-inline-item mr-3">
                                            <a href="#"><i class="fab fa-behance text-muted"></i></a>
                                        </li>
                                    </ul>
                                </div>
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

                            <div class="sidebar-widget bg-white rounded tags p-4 mb-3">
                                <h5 class="mb-4">Tags</h5>

                                <a href="#">Web</a>
                                <a href="#">agency</a>
                                <a href="#">company</a>
                                <a href="#">creative</a>
                                <a href="#">html</a>
                                <a href="#">Marketing</a>
                                <a href="#">Social Media</a>
                                <a href="#">Branding</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
</template>

<script>
export default {
    mounted() {
        // console.log('Component mounted.')
        this.getPost();
        // this.addComment();
        this.updateToken();
    },
    data() {
        return {
            post: '',
            post_id: '',
            body: '',
            comments: []
        }
    },
    methods: {
        getPost() {
            axios.get('/api/posts/' + this.$route.params.slug)
                .then(res => {
                    this.post = res.data;
                    this.post_id = this.post.id;
                    this.comments = this.post.comments;
                    this.initialiseListener();
                })
                .catch(err => {
                    console.log(err)
                })
        },
        addComment() {
            let {body, post_id} = this
            let token = JSON.parse(localStorage.getItem('userToken'))
            axios.post('/api/comment/store',
                {body, post_id},
                {
                    headers: {
                        'Authorization': `Bearer ${token}` // Use backticks for interpolation
                    }
                }
            ).then(res => {
                // console.log(res.date)
                this.comments.unshift(res.data);
                this.body=null;
                // this.getPost;
            }).catch(err => {
                console.log(err)
            })

        },
        updateToken() {
            let token = JSON.parse(localStorage.getItem('userToken'));
            this.$store.commit('setUserToken', token)
            console.log(token)
        },
        initialiseListener(){
            console.log('startEvent')
            Echo.private(`newComment.${this.post_id}`)
                .listen('NewComment', (e) => {
                    console.log(e);
                    this.comments.unshift(e.comment)
                    console.log('Listen To Comment Event');
                });
        }
    },
    computed: {
        isLogged() {
            return this.$store.getters.isLogged;
        }
    }
}
</script>
