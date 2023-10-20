<template>
    <div>
        <!-- Modal edit Post -->
        <div class="modal fade" id="editPostModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Post</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="" class="form-control" required v-model="PostToEdit.title">
                        </div>
                        <div class="form-group">
                            <label>Body</label>
                            <textarea name="" cols="40" class="form-control" required
                                      v-model="PostToEdit.body"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Category</label>
                            <select name="" class="form-control" required v-if="PostToEdit.category"
                                    v-model="PostToEdit.category.id">
                                <option value="0" disabled selected>Choose Category</option>
                                <option v-for="category in categories" :key="category.id" :value="category.id">
                                    {{ category.name }}
                                </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <img :src="'assets/images/blog/' + PostToEdit.image" style="width: 7rem; height: 7rem;">
                            <input type="file" class="form-control" required @change="onImageChange">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" @click.prevent="updatePost">Save changes</button>
                    </div>
                </div>
            </div>

        </div>

    </div>
</template>

<script>
export default {
    name: "EditPost.vue",
    mounted() {
        // console.log('AdminIndex')
        this.getCategories();
        // this.addPost();

    },
    data() {
        return {
            categories: {},
        }
    },
    methods: {
        getCategories() {
            axios.get('/api/admin/categories')
                .then(res => {
                    this.categories = res.data
                    console.log(res.data)
                })
                .catch(err => {
                    console.log(err)
                })
        },
        onImageChange(event) {
            // console.log(event.target.files[0])
            this.PostToEdit.image = event.target.files[0]
        },
        updatePost() {
            let config = {
                headers: {"content-type": 'multipart/form-data'},
            }
            let formdata = new FormData();
            formdata.append('id', this.PostToEdit.id)
            formdata.append('title', this.PostToEdit.title)
            formdata.append('body', this.PostToEdit.body)
            formdata.append('image', this.PostToEdit.image)
            formdata.append('category', this.PostToEdit.category.id)
            axios.post('/api/admin/update-post', formdata, config)
                .then(res => {
                    // this.title = '' ;
                    // this.body = '' ;
                    // this.image = '' ;
                    // this.category = '' ;
                    this.PostToEdit.image = res.data.image
                    $('#editPostModal').modal('hide')
                    $('#modal-backdrop').css('display', 'none')

                    // this.posts = res.data
                    // localStorage.setItem('posts', JSON.stringify(this.posts));
                    console.log(res.data);
                })
                .catch(err => {
                    console.log(err)
                })

        },
    },
    computed: {
        PostToEdit() {
            return this.$store.getters.PostToEdit;

        }
    }
}
$(document).ready(function () {

})
</script>

