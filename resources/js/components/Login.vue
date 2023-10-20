<template>
    <div >
        <global-header></global-header>

        <div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Login</div>

                    <div class="card-body">
                        <form method="POST" noninvalidate>

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

                            <!--                        <div class="row mb-3">-->
                            <!--                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">Confirm Password</label>-->

                            <!--                            <div class="col-md-6">-->
                            <!--                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  v-model="name">-->
                            <!--                            </div>-->
                            <!--                        </div>-->

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary"
                                            :disabled="!isValidForm"
                                            @click.prevent="submitLogin">
                                        Login
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

</template>

<script>
export default {
    name: "Login",
    data() {
        return {
            email: '',
            password: '',
        }
    },
    computed: {
        emailError() {
            return !(/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/.test(this.email))
                && this.email.length > 0
        },
        passwordError() {
            return this.password.length > 0 && this.password.length < 9;
        },
        isValidForm() {
            return (/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/.test(this.email))
                && this.password.length > 7

        },
    },
    methods: {
        submitLogin() {
            let {email, password} = this
            this.$store.dispatch('LoginUser', {email, password})
            this.$router.push('/');
        }
    }
}
</script>
