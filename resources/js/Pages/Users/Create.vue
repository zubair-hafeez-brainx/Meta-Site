<template>
    <admin-layout>
        <div>
            <section id="basic-horizontal-layouts">
                <div class="row">
                    <div class="col-md-9 col-12">
                        <div class="card">
                            <div class="card-header pb-0 mb-0">
                                <h4 v-if="edited_user" class="card-title">Edit User</h4>
                                <h4 v-else class="card-title">Add User</h4>
                                <div class="header  mt-1" v-if="Object.keys(errors).length > 0">
                                    <div class="alert bg-rgba-danger alert-dismissible mb-2 message" role="alert">
                                        <div class="d-flex align-items-center" v-for="error in errors">
                                            <i class="bx bx-error"></i>
                                            <span>
                                                  <jet-input-error :message="error" class="mt-2 error "/>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="px-2 pb-1">
                                <hr class="line">
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <form @submit.prevent="submit" class="form form-horizontal"
                                          enctype="multipart/form-data">
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-xl-9 col-lg-9 col-md-9 col-12">
                                                    <div class="row form-group">
                                                        <div class="col-xl-3 col-lg-4 col-md-6">
                                                            <label>Name *</label>
                                                        </div>
                                                        <div class="col-xl-9 col-lg-8 col-md-6 pl-md-0 form-group">
                                                            <input type="text" id="name" v-model.lazy="form.name"
                                                                   class="form-control"
                                                                   name="" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-xl-3 col-lg-4 col-md-6">
                                                            <label>Email *</label>
                                                        </div>
                                                        <div class="col-xl-9 col-lg-8 col-md-6 pl-md-0 form-group">
                                                            <input type="email" id="email" v-model.lazy="form.email"
                                                                   class="form-control"
                                                                   name="" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div v-if="user && edited_user">
                                                        <div v-if="user.id === edited_user.id">
                                                            <div class="row form-group">
                                                                <div class="col-xl-3 col-lg-4 col-md-6">
                                                                    <label>Current password</label>
                                                                </div>
                                                                <div class="col-xl-9 col-lg-8 col-md-6 pl-md-0 form-group">
                                                                    <input type="text" id="current_password"
                                                                           v-model.lazy="form.current_password"
                                                                           class="form-control"
                                                                           name="" placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col-xl-3 col-lg-4 col-md-6">
                                                                    <label>New password</label>
                                                                </div>
                                                                <div class="col-xl-9 col-lg-8 col-md-6 pl-md-0 form-group">
                                                                    <input type="text" id="new_password"
                                                                           v-model.lazy="form.password"
                                                                           class="form-control"
                                                                           name="" placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col-xl-3 col-lg-4 col-md-6">
                                                                    <label>Confirm password</label>
                                                                </div>
                                                                <div class="col-xl-9 col-lg-8 col-md-6 pl-md-0 form-group">
                                                                    <input type="text" id="password_confirmation"
                                                                           v-model.lazy="form.password_confirmation"
                                                                           class="form-control"
                                                                           name="" placeholder="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-lg-3 col-md-3 col-12 mb-2 mt-n0">
                                                    <div class="d-flex justify-content-center mb-0 responsive-image">
                                                        <img v-if="photo"
                                                             class="rounded-circle pro-image justify-content-center"
                                                             id="profile-image"
                                                             :src="photo">
                                                        <img v-else
                                                             :src="form.profile_photo_path ? '/' +form.profile_photo_path: '/img/avator.jpg'"
                                                             class="rounded-circle pro-image justify-content-center ">
                                                    </div>
                                                    <div class="d-flex justify-content-center mb-0 responsive-image">
                                                        <input type="file"
                                                               @change="preview_image"
                                                               id="profile-upload"
                                                               ref="photo"
                                                               style="display:none"/>
                                                        <label for="profile-upload"
                                                               class="btn btn-light-secondary btn-sm mt-0.5 justify-content-center small">
                                                           Select Image
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-11 d-flex justify-content-start px-1">
                                                    <button type="submit" class="btn btn-primary mr-1 mb-1"
                                                            v-if="form.processing" disabled>
                                                    <span class="spinner-border spinner-border-sm pb-0.5" role="status"
                                                          aria-hidden="true"></span>
                                                        <span class="">Saving...</span>
                                                    </button>
                                                    <button type="submit" class="btn btn-primary mr-1 mb-1"  v-else>
                                                        Save
                                                    </button>
                                                    <Link :href="route('users.index')" type="button"
                                                                  class="btn btn-light-secondary mr-1 mb-1">
                                                        Back
                                                    </Link>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </admin-layout>
</template>

<script>
    import AdminLayout from "../../Layouts/AdminLayout";
    import Label from "../../Jetstream/Label";
    import JetInputError from './../../Jetstream/InputError'
    import RightBar from "../../admin/RightBar";
    import {computed} from 'vue';
    import {usePage} from "@inertiajs/inertia-vue3";

    export default {
        name: "Create",
        props: ["edited_user", "errors"],
        components: {
            Label,
            AdminLayout,
            JetInputError,
            RightBar
        },
        setup() {
            const user = computed(() => usePage().props.value.user);
            return {user}
        },
        data() {
            return {
                form: this.$inertia.form({
                    'name': '',
                    'email': '',
                    'profile_photo_path': '',
                }),
                photoPreview: '',
                photo: '',
            }
        },
        beforeMount() {
            document.title = process.env.MIX_APP_NAME + (this.edited_user ? " - Edit User" : " - Create User");
            if (this.edited_user) {
                this.update = true;
                let data = this.edited_user;
                Object.assign(data, {
                    '_method': 'PUT',
                    'current_password': '',
                    'password': '',
                    'password_confirmation': ''

                })
                ;
                this.form = this.$inertia.form(data);
            }
        },
        mounted() {
            console.log(this.edited_user, this.user);
            if (this.edited_user) {
                this.photo = this.edited_user.profile_photo_path ? '/' + this.edited_user.profile_photo_path : '/img/avator.jpg'
            }
        },
        watch: {
            photoPreview(val) {
                if (val) {
                    this.photo = val;
                }
            }
        },
        methods: {
            preview_image() {
                const reader = new FileReader();
                reader.onload = (e) => {
                    this.photoPreview = e.target.result;
                };
                reader.readAsDataURL(this.$refs.photo.files[0]);
            },
            submit() {
                if (this.update) {
                    this.form.profile_photo_path = document.getElementById('profile-upload').files[0];
                    this.form.post(route('users.update', this.edited_user.id))
                } else {
                    this.form.profile_photo_path = document.getElementById('profile-upload').files[0];
                    this.form.post('/users');
                }
            },
        }
    }
</script>

<style scoped>

    .line {
        border-top: 1px dashed #C7CFD6;
        width: 100%;
    }
    .error {
        margin-top: 0px !important;
    }

    .pro-image {
        width: 100px !important;
        height: 100px !important;
    }
    @media (max-width: 575.98px) {
        .responsive-image{
            justify-content: left !important;
        }
        .pro-image{
            margin-left: 10px !important;
            margin-bottom: 5px !important;
        }
    }

</style>
