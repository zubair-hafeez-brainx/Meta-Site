<template>
    <admin-layout>
        <div class="col-12 px-0">
            <div class="row">
                <div class="col-xl-4 col-sm-6 col-4">
                    <div class="card text-center">
                        <div class="card-content">
                            <div class="card-body" style="width: 423px; height: 333px">
                                <h1 class="card-title">Basic</h1>
                                <p class="card-text">${{ settings[0].value }}</p>
                                <hr>
                                <p class="card-text">{{ settings[2].value }} Free Requests Per Months</p>
                                <hr>
                                <p>${{ settings[1].value }} Per Request After Free Allowed</p>
                                <hr>
                                <Link class="btn btn-light-primary btn-sm add-btn"
                                      :href="route('subscription.create')">
                                    Get Started
                                </Link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </admin-layout>
</template>

<script>

import AdminLayout from "../../Layouts/AdminLayout";
import Label from "../../Jetstream/Label";
import JetInputError from './../../Jetstream/InputError'
import {Link, useForm} from '@inertiajs/inertia-vue3'
import ErrorComponent from '../../components/ErrorComponent'

export default {
    name: "Subscription",
    props: ['settings'],
    components: {
        Link,
        Label,
        AdminLayout,
        JetInputError,
        ErrorComponent
    },
    setup() {
        const form = useForm({});
        return {form}
    },
    data() {
        return {}
    },
    beforeMount() {
        document.title = process.env.MIX_APP_NAME + " - Create Role";
    },
    mounted() {
        console.log("settings: ", this.settings)
    },
    methods: {
        getPackage(id) {
            this.form.package_id = id;
        },
        submit() {
            this.form.get('/subscription/start');
        },
    }
}
</script>

<style scoped>

.action {
    margin-right: 4px !important;
}

.card {
    border: 1px solid #d2d6dc;
    border-radius: 0px !important;
}

.card-one {
    border: 1px solid #d2d6dc;
    border-bottom: 0px;
}

table thead th {
    vertical-align: bottom;
    border-bottom: 1px solid #d2d6dc;
}

.custom-dropdown {
    margin-top: 0.5rem !important;
}

@media (max-width: 575.98px) {

    .filter-container {
        width: 100% !important;
        padding-right: 22px !important;
        padding-left: 11px !important;
    }

    .filter-dropdown {
        width: 100% !important;
        padding-right: 0px !important;
        padding-left: 11px !important;
    }

    .sort-dropdown {
        width: 100% !important;
        padding-left: 11px !important;
        padding-right: 0px !important;
        padding-top: 15px !important;
    }
}
</style>
