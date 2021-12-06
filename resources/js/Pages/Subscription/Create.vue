<template>
    <admin-layout>
        <div>
            <section id="basic-horizontal-layouts">
                <div class="row match-height">
                    <div class="col-md-9 col-12">
                        <div class="card">
                            <div class="card-header pb-0 mb-0">
                                <h4 class="card-title" v-if="module">Edit Package</h4>
                                <h4 class="card-title" v-else>Add Payment</h4>
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
                                    <form @submit.prevent="submit" class="form form-horizontal">
                                        <div class="row form-group">
                                            <div class="col-md-3">
                                                <label>Type *</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <select class="form-control" id="card_type" name="card_type"
                                                        v-model="form.card_type">
                                                    <option value=""></option>
                                                    <option value="visa">Visa</option>
                                                </select>
                                                <ErrorComponent input="card_type"></ErrorComponent>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-md-3">
                                                <label>Card Number</label>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <input type="text" id="card-number" class="form-control"
                                                       name="card_number" placeholder=""
                                                       v-model="form.card_number">
                                                <ErrorComponent input="card_number"></ErrorComponent>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-md-3">
                                                <label>Expire</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <input type="text" name="expire" id="expire" class="form-control"
                                                       v-model="form.expire">
                                                <ErrorComponent input="expire"></ErrorComponent>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-md-3">
                                                <label>CVV/CVC</label>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <input type="text" id="cvv2" class="form-control"
                                                       name="cvv2" placeholder=""
                                                       v-model="form.cvv2">
                                                <ErrorComponent input="cvv2"></ErrorComponent>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-md-3">
                                                <label>Auto Renew</label>
                                            </div>
                                            <div class="col-md-6 form-group">

                                                <div
                                                    class="custom-control custom-switch custom-switch-success mr-2 mb-1">
                                                    <input v-if="form.auto_renew == 1" type="checkbox"
                                                           class="custom-control-input"
                                                           v-model="form.auto_renew"
                                                           checked id="customSwitch11">
                                                    <input v-else type="checkbox" class="custom-control-input"
                                                           v-model="form.auto_renew" id="customSwitch11">
                                                    <label class="custom-control-label" for="customSwitch11">
                                                        <span class="switch-icon-left"></span>
                                                    </label>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-md-3">
                                                <label>Save Card</label>
                                            </div>
                                            <div class="col-md-6 form-group pb-0 mb-0">
                                                <div
                                                    class="custom-control custom-switch custom-switch-success mr-2 mb-1">
                                                    <input v-if="form.save_card == 1" type="checkbox"
                                                           class="custom-control-input"
                                                           v-model="form.save_card"
                                                           checked id="customSwitch1">
                                                    <input v-else type="checkbox" class="custom-control-input"
                                                           v-model="form.save_card" id="customSwitch1">
                                                    <label class="custom-control-label" for="customSwitch1">
                                                        <span class="switch-icon-left"></span>
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
                                            <Link :href="route('subscription.index')" type="button"
                                                          class="btn btn-light-secondary mr-1 mb-1">
                                                Back
                                            </Link>
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
import AdminLayout from "@/Layouts/AdminLayout";
import Label from "../../Jetstream/Label";
import JetInputError from './../../Jetstream/InputError'
import {Link, useForm} from '@inertiajs/inertia-vue3'
import ErrorComponent from '../../components/ErrorComponent'


export default {
    name: "Create",
    props: ['package_id', 'errors'],
    components: {
        AdminLayout,
        Link,
        Label,
        JetInputError,
        ErrorComponent
    },
    setup() {
        const form = useForm({
            "package_id": '',
            "card_type": '',
            "card_number": '',
            "expire": '',
            "cvv2": '',
            'auto_renew': false,
            "save_card": false
        });
        return {form}
    },
    mounted() {
        console.log(this.package_id)
    },

    methods: {

        submit() {
            this.form.package_id = this.package_id;
            this.form.post('/subscription/start');
        },
    }
}
</script>

<style scoped>

</style>
