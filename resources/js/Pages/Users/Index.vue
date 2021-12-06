<template>
    <admin-layout>
        <div class="col-12 px-0">
        </div>
        <div class="row pb-3" id="table-hover-row">
            <div class="col-12">
                <div class="card-one py-0 my-0 bg-white">
                    <div class="card-content">
                        <div data-repeater-list="group-a">
                            <div>
                                <div class="top d-flex flex-wrap">
                                    <div class="action-filters flex-grow-1">
                                        <div id="DataTables_Table_0_filter" class="dataTables_filter">
                                            <div
                                                class="input-group form-group d-flex position-relative mt-1 px-2 pr-md-0">
                                                <input type="text" class="form-control border-light-gray btn-height"
                                                       placeholder="Search..."
                                                       aria-label="Search"
                                                       aria-describedby="basic-addon2" v-model="query.query"
                                                       @change="search">
                                                <div class="input-group-append">
                                                    <button class="input-group-text search-btn" @change="search">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23"
                                                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                             stroke-width="2" stroke-linecap="round"
                                                             stroke-linejoin="round"
                                                             class="feather feather-search feather-16 pb-0 mb-0 mt-0">
                                                            <circle cx="11" cy="11" r="8"></circle>
                                                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                                        </svg>
                                                    </button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--                                    <div class="actions action-btns d-flex align-items-center flex flex-wrap pr-1 ">-->
                                    <!--                                        <div class="input-group-append ">-->
                                    <!--                                            <button class="input-group-text search-btn" @change="search">-->
                                    <!--                                                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23"-->
                                    <!--                                                     viewBox="0 0 24 24" fill="none" stroke="currentColor"-->
                                    <!--                                                     stroke-width="2" stroke-linecap="round" stroke-linejoin="round"-->
                                    <!--                                                     class="feather feather-search feather-16 pb-0 mb-0 mt-0">-->
                                    <!--                                                    <circle cx="11" cy="11" r="8"></circle>-->
                                    <!--                                                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>-->
                                    <!--                                                </svg>-->
                                    <!--                                            </button>-->
                                    <!--                                        </div>-->
                                    <!--                                    </div>-->
                                    <div class="actions action-btns d-flex align-items-center sort-dropdown pl-1">
                                        <div class="dropdown w-100 pr-2 sort-dropdown2">
                                            <button class="btn border dropdown-toggle w-100" type="button"
                                                    data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                Sort
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right py-0 my-0 custom-dropdown"
                                                 aria-labelledby="" @click="stopPropagation">
                                                <div class="col-12 pl-2 pt-1">
                                                    <div class="d-inline-flex w-100">
                                                        <h6 class="py-0 my-0">Sort</h6>
                                                        <span class="primary pl-20 ml-2 pointer" @click="resetSort">Reset</span>
                                                    </div>
                                                    <div class="align-items-center text-base pt-1">
                                                        <p class="tag">
                                                            <input type="checkbox" name="name" id="name"
                                                                   v-model="query.name">
                                                            <label class="pl-1 py-0 my-0" for="name">Name</label>
                                                        </p>
                                                        <p class="tag">
                                                            <input type="checkbox" name="Email" id="email"
                                                                   v-model="query.email">
                                                            <label class="pl-1 py-0 my-0" for="email">Email</label>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="dropdown-divider py-0 my-0"></div>
                                                <div class="col-12 pl-2 d-inline-flex">
                                                    <p class="pt-1">
                                                        <button type="button" id="asce" @click="sort('asc')"
                                                                class=" btn btn-sm btn-primary font-small font-weight-normal stock-order">
                                                            Asc
                                                        </button>
                                                    </p>
                                                    <p class="pt-1 pl-3">
                                                        <button type="button" id="desc" @click="sort('desc')"
                                                                class=" btn btn-sm btn-light-secondary font-small font-weight-normal stock-order">
                                                            Desc
                                                        </button>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                <tr>
                                    <th class="text-right pl-2 pr-0 mr-0" style="width: 80px;"></th>
                                    <th class="text-left pl-0 ml-0">name</th>
                                    <th class="text-left">email</th>
                                    <th class="text-right"></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="user in users.data">
                                    <td class="text-right pl-2 pr-0 mr-0">
                                        <img
                                            :src="user.profile_photo_path ? '/' +user.profile_photo_path: '/img/avator.jpg'"
                                            class="rounded-circle" style="height: 45px; width: 45px">
                                    </td>
                                    <td class="text-left pl-0 ml-0">{{ user.name }}</td>
                                    <td>{{ user.email }}</td>
                                    <td class="text-right pr-2">
                                            <span class="d-inline-flex align-items-center">
                                                <button v-on:click="confirmDelete(user.id)" class="ml-0.5">
                                                    <span class="badge-circle badge-circle-light-secondary ml-0.5">
                                                        <i class="bx bx-trash font-medium-1 text-center"></i>
                                                    </span>
                                                </button>
                                            </span>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <PasswordConfirmationModal v-if="passwordConfirmation" :password-confirmation="passwordConfirmation"
                                       @clicked="Clicked"
                                       @deleteitem="deleteItem"></PasswordConfirmationModal>
            <DeletedModal v-if="deleteConfirmation" :delete-confirmation="deleteConfirmation"
                          @clicked="Clicked"></DeletedModal>
            <div class="col-12 ">
                <pagination :links="users.links" class="float-right"></pagination>
            </div>
        </div>
    </admin-layout>
</template>
<script>

import AdminLayout from "../../Layouts/AdminLayout";
import Button from "../../Jetstream/Button"
import Pagination from "../../admin/Pagination";
import Label from "../../Jetstream/Label";
import ConfirmatiomModal from "../SweetAlert/ConfirmatiomModal";
import PasswordConfirmationModal from "../SweetAlert/PasswordConfirmationModal";
import DeletedModal from "../SweetAlert/DeletedModal";


export default {
    props: ["users", "params"],
    name: "index",
    components: {
        Label,
        Button,
        AdminLayout,
        Pagination,
        ConfirmatiomModal,
        PasswordConfirmationModal,
        DeletedModal
    },
    data() {
        return {
            query: {
                query: '',
                id: false,
                name: false,
                email: false,
                created_at: false,
                direction: null
            },
            sweetAlert: false,
            itemId: '',
            passwordConfirmation: false,
            deleteConfirmation: false
        }
    },
    beforeMount() {
        document.title = process.env.MIX_APP_NAME + " - Users";
    },
    mounted() {

        if (this.$page.is_delete == 0) {
            this.deleteConfirmation = true
            this.$page.is_delete = ''
        }
        if (this.params) {
            let params = Object.keys(this.params);
            for (let i of params) {
                Object.assign(this.query, {[i]: this.params[i]});
            }
        }
    },
    methods: {
        resetQuery() {
            this.query = {}
            this.loadData()
        },
        Clicked() {
            this.passwordConfirmation = false;
            this.deleteConfirmation = false;
        },
        deleteItem(pass) {
            this.sweetAlert = false;
            this.$inertia.visit(`/users/${this.itemId}`, {
                method: 'delete', data: {
                    'pass': pass
                }
            })
        },
        confirmDelete(id) {
            this.passwordConfirmation = true;
            this.itemId = id;
        },
        search() {
            this.loadData()
        },
        filter() {
            this.loadData();
        },
        sort(direction) {
            this.query.direction = direction;
            this.loadData();
        },
        loadData() {
            let query = {};
            for (let item in this.query) {
                if (this.query[item]) {
                    Object.assign(query, {[item]: this.query[item]})
                }
            }
            this.$inertia.visit(route('users.index'), {
                method: 'get',
                data: {
                    ...query
                }
            })
        },
        destroy(id) {
            this.$inertia.delete(`/users/${id}`)
        },
        resetSort(e) {
            this.query.direction = '';
            this.query.id = '';
            this.query.name = '';
            this.query.email = '';
            this.query.created_at = '';
            this.loadData();
        },
        stopPropagation(e) {
            e.stopPropagation();
        },
    },
}
</script>

<style scoped>
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
    .sort-dropdown {
        width: 100% !important;
        padding-left: 22px !important;
        padding-right: 0px !important;
    }
}
</style>
