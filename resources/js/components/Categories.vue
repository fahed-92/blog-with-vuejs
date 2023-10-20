<template>

    <div class="">
        <div class="sidebar-widget bg-white rounded tags p-4 mb-3" >
            <h5 class="mb-4">Categories</h5>
            <ul class="list-unstyled" v-for="(category , index) in categories" :key="index">
<!--                <router-link :to="'category/${category.slug}/posts'">{{ category.name }}</router-link>-->
                <router-link :to="'category/' + category.slug + '/posts'">{{category.name}}</router-link>
            </ul>
        </div>
    </div>

</template>

<script>
export default {
    mounted() {
        // console.log('Component mounted.')
        this.getCategories();
    },
    data() {
        return {
            categories: ''
        }
    },
    methods: {
        getCategories() {
            axios.get('/api/categories')
                .then(res => {
                    this.categories = res.data
                })
                .catch(err => {
                    console.log(err)
                })
        }
    }
}
</script>
