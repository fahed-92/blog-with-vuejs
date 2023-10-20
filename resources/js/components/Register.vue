<template>
    <div>
        <global-header></global-header>

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Register</div>

                <div class="card-body">
                    <form method="POST" noninvalidate>
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control " name="name" value="" autofocus
                                       v-model="name">
                                <div class="text-danger" v-show="nameError">
                                    ... this first name is too short
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">Email Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control " name="email" value=""
                                       v-model="email">
                                <div class="text-danger" v-show="emailError">
                                    ... this email is not correct
                                </div>

                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password"
                                       v-model="password">
                                <div class="text-danger" v-show="passwordError">
                                    ... this password is very week...<br>
                                    it should be minimum 8 characters
                                </div>
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button  class="btn btn-primary"
                                        :disabled="!isValidForm"
                                        @click.prevent="submitRegister">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Register",
    data() {
        return {
            name: '',
            email: '',
            password: '',
        }
    },
    computed: {
        nameError() {
            return this.name.length > 0 && this.name.length < 4
        },
        emailError() {
            return !(/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/.test(this.email))
                && this.email.length > 0
        },
        passwordError() {
            return this.password.length > 0 && this.password.length < 8;
        },
        isValidForm() {
            return this.name.length > 4
                && (/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/.test(this.email))&& this.email.length > 0
                && this.password.length > 7
        },
    },
    methods: {
        submitRegister() {
            let {name, email, password} = this;
            this.$store.dispatch('RegisterUser', {name, email, password})
        }
    }
}
</script>
