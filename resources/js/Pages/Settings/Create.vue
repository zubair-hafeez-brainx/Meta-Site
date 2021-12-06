<template>
    <admin-layout>
        <div>
            <section id="basic-horizontal-layouts">
                <div class="row match-height">
                    <div class="col-md-9 col-12">
                        <div class="card">
                            <div class="card-header pb-0 mb-0">
                                <h4 class="card-title" v-if="setting">Edit Setting</h4>
                                <h4 class="card-title" v-else>Add Setting</h4>
                                <div class="header  mt-1" v-if="Object.keys(errors).length > 0">
                                    <div class="alert bg-rgba-danger alert-dismissible mb-2 message" role="alert">
                                        <div class="d-flex align-items-center" v-for="error in errors">
                                            <i class="bx bx-error mb-2"></i>
                                            <span>
                                                  <jet-input-error :message="error" class="error"/>
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
                                    <form @submit.prevent="submit" class="form form-horizontal">
                                        <div class="form-body">
                                            <div class="row form-group">
                                                <div class="col-md-3">
                                                    <label>Name *</label>
                                                </div>
                                                <div class="col-md-6 form-group">
                                                    <input type="text" id="name" v-model="form.name"
                                                           class="form-control"
                                                           name="title">
                                                    <!--                                                    <jet-input-error :message="form.error('name')"-->
                                                    <!--                                                                     class="mt-2 error"/>-->
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-md-3">
                                                    <label>Type *</label>
                                                </div>
                                                <div class="col-md-6 form-group">
                                                    <input type="text" id="type" v-model="form.type"
                                                           class="form-control"
                                                           name="type" placeholder="">
                                                    <!--                                                    <jet-input-error :message="form.error('type')"-->
                                                    <!--                                                                     class="mt-2 error"/>-->
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-md-3">
                                                    <label>Value *</label>
                                                </div>
                                                <div class="col-md-6 form-group">
                                                    <input type="text" id="value" v-model="form.value"
                                                           class="form-control"
                                                           name="value" placeholder="">
                                                    <!--                                                    <jet-input-error :message="form.error('value')"-->
                                                    <!--                                                                     class="mt-2 error"/>-->
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-md-3">
                                                    <label>Status</label>
                                                </div>
                                                <div class="col-md-6 form-group">
                                                    <div
                                                        class="custom-control custom-switch custom-switch-success mr-2 mb-1">
                                                        <input type="checkbox" class="custom-control-input"
                                                               :value="form.enable"
                                                               id="customSwitch11" checked>
                                                        <label class="custom-control-label" for="customSwitch11">
                                                            <span class="switch-icon-left"><i
                                                                class="bx bx-check"></i></span>
                                                            <span class="switch-icon-right"><i class="bx bx-check"></i></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-11 d-flex justify-content-start px-0">
                                                <button type="submit" class="btn btn-primary mr-1 mb-1"
                                                        v-if="form.processing" disabled>
                                                    <span class="spinner-border spinner-border-sm pb-0.5" role="status"
                                                          aria-hidden="true"></span>
                                                    <span class="">Saving...</span>
                                                </button>
                                                <button type="submit" class="btn btn-primary mr-1 mb-1" v-else>
                                                    Save
                                                </button>
                                                <Link :href="route('settings.index')" type="button"
                                                      class="btn btn-light-secondary mr-1 mb-1">
                                                    Back
                                                </Link>
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
import { Link, usePage } from '@inertiajs/inertia-vue3'
import AdminLayout from "../../Layouts/AdminLayout";
import Label from "../../Jetstream/Label";
import JetInputError from './../../Jetstream/InputError'

export default {
    name: "Create",
    props: ["setting", "errors"],
    components: {
        Label,
        AdminLayout,
        JetInputError,
        Link,
    },
    data() {
        return {
            form: this.$inertia.form({
                'name': '',
                'type': '',
                'value': '',
                'enable': false
            })
        }
    },
    beforeMount() {
        document.title = process.env.MIX_APP_NAME + " - Create Setting";
        if (this.setting) {
            this.update = true;
            let data = this.setting;
            Object.assign(data, {
                '_method': 'PUT',
                'enable': this.setting.enable
            })
            this.form = this.$inertia.form(data);
        }
    },
    methods: {
        submit() {
            if (this.update) {
                this.form.post(route('settings.update', this.setting.id))
            } else {
                this.form.post('/settings')
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


</style>
