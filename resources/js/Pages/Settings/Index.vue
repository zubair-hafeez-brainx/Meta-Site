<template>
    <admin-layout>
        <div class="col-12 px-0">
            <div class="col form-group p-0">
                <Link :href="route('settings.create')" class="btn btn-primary" data-repeater-create="">
                    Add Setting
                </Link>
            </div>
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
                                    <div
                                        class="actions action-btns d-flex align-items-center flex flex-wrap filter-container pl-1">
                                        <div class="dropdown  md:w-1/2 sm:w-1 pr-1 filter-dropdown">
                                            <button class="btn border dropdown-toggle w-100" type="button"
                                                    id="" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                Filter
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right py-0 my-0 custom-dropdown"
                                                 @click="stopPropagation"
                                                 aria-labelledby="">
                                                <div class="col-12 pl-2 pt-1">
                                                    <div class="d-inline-flex w-100">
                                                        <h6 class="py-0 my-0">Status</h6>
                                                        <span class="primary pl-20 ml-2 pointer"
                                                              @click="resetFilter">Reset</span>
                                                    </div>
                                                    <div class="align-items-center text-base pt-1">
                                                        <p class="tag">
                                                            <input type="checkbox" name="enable" id="enable"
                                                                   v-model="query.enable">
                                                            <label class="pl-1 py-0 my-0" for="enable">Enable</label>
                                                        </p>
                                                        <p class="tag">
                                                            <input type="checkbox" name="disable" id="disable"
                                                                   v-model="query.disable">
                                                            <label
                                                                class="pl-1 py-0 my-0" for="disable">Disable</label>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="dropdown-divider py-0 my-0"></div>
                                                <div class="col-12 pl-2">
                                                    <p class="pt-1">
                                                        <button type="button" id="asc" @click="filter"
                                                                class=" btn btn-sm btn-primary font-small font-weight-normal stock-order">
                                                            Filter
                                                        </button>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="dropdown md:w-1/2 sm:w-1 pr-2 sort-dropdown">
                                            <button class="btn border dropdown-toggle w-100" type="button"
                                                    data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                Sort
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right py-0 my-0 custom-dropdown"
                                                 aria-labelledby="" @click="stopPropagation">
                                                <div class="col-12 pl-2 pt-1">
                                                    <div class="d-inline-flex w-100">
                                                        <h6 class="py-0 my-0 ">Sort</h6>
                                                        <span class="primary pl-20 ml-2 pointer" @click="resetSort">Reset</span>
                                                    </div>
                                                    <div class="text-base pt-1">
                                                        <p class="tag">
                                                            <input type="checkbox" name="slug" id="name"
                                                                   v-model="query.name">
                                                            <label class="pl-1 py-0 my-0" for="name">Name</label>
                                                        </p>
                                                        <p class="tag">
                                                            <input type="checkbox" name="type" id="type"
                                                                   v-model="query.type">
                                                            <label class="pl-1 py-0 my-0" for="type">Type</label>
                                                        </p>
                                                        <p class="tag">
                                                            <input type="checkbox" name="value" id="value"
                                                                   v-model="query.value">
                                                            <label
                                                                class="pl-1 py-0 my-0" for="value">Value</label>
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

                                    <th class="text-left pl-2">Name</th>
                                    <th class="text-left">Type</th>
                                    <th class="text-left">value</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-right"></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="setting in settings.data">
                                    <td class="text-left pl-2">{{ setting.name }}</td>
                                    <td class="text-left">{{ setting.type }}</td>
                                    <td class="text-left">{{ setting.value }}</td>
                                    <td class="text-center">
                                        <span v-if="setting.enable == 1" class="badge badge-light-success badge-pill">Enable</span>
                                        <span v-else class="badge badge-light-danger badge-pill">Disable</span>
                                    </td>
                                    <td class="text-right">
                                            <span class="d-inline-flex align-items-center">
                                                <Link :href="route('settings.edit',setting.id)">
                                                    <span class="badge-circle badge-circle-light-secondary">
                                                        <i class="bx bx-edit font-medium-1 align-items-center text-center"></i>
                                                    </span>
                                                </Link>
                                                <button v-on:click="confirmDelete(setting.id)">
                                                    <span class="badge-circle badge-circle-light-secondary ml-1">
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
<!--            <ConfirmatiomModal v-if="sweetAlert" :sweetAlert="sweetAlert" @clicked="Clicked"-->
<!--                               @deleteitem="deleteItem"></ConfirmatiomModal>-->
            <PasswordConfirmationModal v-if="passwordConfirmation" :password-confirmation="passwordConfirmation"
                                       @clicked="Clicked"
                                       @deleteitem="deleteItem"></PasswordConfirmationModal>
            <DeletedModal v-if="deleteConfirmation" :delete-confirmation="deleteConfirmation"
                          @clicked="Clicked"></DeletedModal>
            <div class="col-12 ">
                <pagination :links="settings.links" class="float-right"></pagination>
            </div>
        </div>
    </admin-layout>
</template>

<script>

import { Link, usePage } from '@inertiajs/inertia-vue3'
import AdminLayout from "../../Layouts/AdminLayout";
import Button from "../../Jetstream/Button"
import Pagination from "../../admin/Pagination";
import ConfirmatiomModal from "../SweetAlert/ConfirmatiomModal";
import PasswordConfirmationModal from "../SweetAlert/PasswordConfirmationModal";
import DeletedModal from "../SweetAlert/DeletedModal";


export default {

    name: "index",
    props: ["params", 'settings', 'info'],
    components: {
        Button,
        AdminLayout,
        Pagination,
        ConfirmatiomModal,
        PasswordConfirmationModal,
        DeletedModal,
        Link
    },
    data() {
        return {
            query: {
                query: '',
                id: false,
                type: false,
                name: false,
                enable: false,
                disable: false,
                value: false,
                direction: null
            },
            sweetAlert: false,
            itemId: '',
            searchItem: false,
            passwordConfirmation: false,
            deleteConfirmation: false
        }
    },
    beforeMount() {
        document.title = process.env.MIX_APP_NAME + " - Settings";
    },
    mounted() {
        if (this.$page.is_delete == 0) {
            this.deleteConfirmation = true
            this.$page.is_delete = ''
        }
        if (this.params) {
            Object.assign(this.query, this.params);
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
            this.$inertia.visit(`/settings/${this.itemId}`, {
                method: 'delete', data: {
                    'pass': pass
                }
            })
            // var res = axios.delete(`/settings/${this.itemId}`, {params: {'password': pass}})
            // console.log(res);
        },
        confirmDelete(id) {
            this.passwordConfirmation = true,
            this.itemId = id;
        },
        stopPropagation(e) {
            e.stopPropagation();
        },
        resetSort(e) {
            this.query = {};
            this.query.direction = '';
            this.query.id = '';
            this.query.type = ''
            this.query.name = '';
            this.query.value = '';
            this.query.enable = '';
            this.query.disable = '';
            this.loadData();
        },
        resetFilter() {
            this.query = {};
            this.query.id = '';
            this.query.type = ''
            this.query.name = '';
            this.query.value = '';
            this.query.direction = '';
            this.query.enable = '';
            this.query.disable = '';
            this.loadData();
        },
        search() {
            this.searchItem = true;
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

            if (this.query.query) {
                Object.assign(query, {'query': this.query.query})
            }
            if (this.query.id) {
                Object.assign(query, {'id': this.query.id})
            }
            if (this.query.type) {
                Object.assign(query, {'type': this.query.type})
            }
            if (this.query.enable) {
                Object.assign(query, {'enable': this.query.enable})
            }
            if (this.query.name) {
                Object.assign(query, {'name': this.query.name})
            }
            if (this.query.disable) {
                Object.assign(query, {'disable': this.query.disable})
            }
            if (this.query.value) {
                Object.assign(query, {'value': this.query.value})
            }
            if (this.query.direction) {
                Object.assign(query, {'direction': this.query.direction})
            }
            this.$inertia.visit(route('settings.index'), {
                method: 'get',
                data: {
                    ...query
                }
            })
        },
    }
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
