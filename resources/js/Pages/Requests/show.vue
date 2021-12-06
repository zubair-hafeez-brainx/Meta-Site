<template>
    <admin-layout>
        <div>
            <section id="basic-horizontal-layouts">
                <div class="row match-height">
                    <div class="col-md-12 col-lg-9 col-xl-9 col-12">
                        <div class="card invoice-print-area">
                            <div class="card-header pb-0 mb-0">
                                <h1 class="card-title">
                                    {{ customer.name }} <small> ({{ customer.email }})</small>
                                </h1>
                            </div>
                            <div class="px-2">
                                <hr class="line">
                            </div>
                            <div class="card-content">
                                <div class="card-body pb-1 mx-25">
                                    <div v-if="requests.data.length >0">
                                        <div class="row pb-0.5">
                                            <div class="col-10">
                                                <h2 class="card-title mb-0 pt-1">URL Requests</h2>
                                            </div>
                                            <div class="col-2">
                                                <div class="col form-group pr-0 pb-0.5">
                                                    <inertia-link href="#"
                                                                  class="px-0">
                                                        <i class="bx bxs-plus-circle pt-1 primary float-right add-btn font-large-1"></i>
                                                    </inertia-link>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="row col-12 pr-0" id="table-hover-row">
                                                <div class="col-12 pr-0">
                                                    <div class="card-one py-0 my-0 bg-white">
                                                        <div class="card-content">
                                                            <div data-repeater-list="group-a">
                                                                <div>
                                                                    <div class="top d-flex flex-wrap">
                                                                        <div class="action-filters flex-grow-1">
                                                                            <div id="DataTables_Table_0_filter"
                                                                                 class="dataTables_filter">
                                                                                <fieldset
                                                                                    class="form-group position-relative mt-1 pl-1">
                                                                                    <input type="text"
                                                                                           class="form-control float-left search-input"
                                                                                           id="iconLeft2"
                                                                                           placeholder="Search..."
                                                                                           v-model="query.query"
                                                                                           @change="search">
                                                                                    <div class="form-control-position"
                                                                                         @click="resetQuery"
                                                                                         v-if="query.query">
                                                                                        <i class="bx bx-x"></i>
                                                                                    </div>
                                                                                </fieldset>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="actions action-btns d-flex align-items-center flex flex-wrap pr-1">
                                                                            <div class="input-group-append ">
                                                                                <button
                                                                                    class="input-group-text search-btn"
                                                                                    @change="search">
                                                                                    <svg
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        width="23" height="37"
                                                                                        viewBox="0 0 24 24"
                                                                                        fill="none"
                                                                                        stroke="currentColor"
                                                                                        stroke-width="2"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round"
                                                                                        class="feather feather-search feather-16 pb-0 mb-0 mt-0">
                                                                                        <circle cx="11" cy="11"
                                                                                                r="8"></circle>
                                                                                        <line x1="21" y1="21" x2="16.65"
                                                                                              y2="16.65"></line>
                                                                                    </svg>
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="actions action-btns d-flex align-items-center flex flex-wrap">
                                                                            <div class="dropdown md:w-1/2 sm:w-1 pr-1">
                                                                                <button
                                                                                    class="btn border dropdown-toggle w-100"
                                                                                    type="button"
                                                                                    id="invoice-filter-btn"
                                                                                    data-toggle="dropdown"
                                                                                    aria-haspopup="true"
                                                                                    aria-expanded="false">
                                                                                    Filter
                                                                                </button>
                                                                                <div
                                                                                    class="dropdown-menu dropdown-menu-right py-0 my-0 custom-dropdown"
                                                                                    aria-labelledby="invoice-filter-btn"
                                                                                    @click="stopPropagation">
                                                                                    <div class="col-12 pl-2 pt-1">
                                                                                        <div
                                                                                            class="d-inline-flex w-100">
                                                                                            <h6 class="py-0 my-0">
                                                                                                Filter</h6>
                                                                                            <span
                                                                                                class="primary pl-20 ml-2 pointer"
                                                                                                @click="resetFilter">Reset</span>
                                                                                        </div>
                                                                                        <div
                                                                                            class="align-items-center text-base pt-1">
                                                                                            <p class="tag">
                                                                                                <input type="checkbox"
                                                                                                       name="id"
                                                                                                       id="paid"
                                                                                                       v-model="query.paid"><label
                                                                                                class="pl-1"
                                                                                                for="paid">Paid</label>
                                                                                            </p>
                                                                                            <p class="tag">
                                                                                                <input type="checkbox"
                                                                                                       name="name"
                                                                                                       v-model="query.un_paid"
                                                                                                       id="un_paid"><label
                                                                                                class="pl-1"
                                                                                                for="un_paid">Un
                                                                                                Paid</label>
                                                                                            </p>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div
                                                                                        class="dropdown-divider py-0 my-0"></div>
                                                                                    <div class="col-12 pl-2">
                                                                                        <p class="pt-1">
                                                                                            <button type="button"
                                                                                                    id="asc"
                                                                                                    @click="filter"
                                                                                                    class=" btn btn-sm btn-primary font-small font-weight-normal stock-order">
                                                                                                Filter
                                                                                            </button>
                                                                                        </p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="dropdown md:w-1/2 sm:w-1 pr-1">
                                                                                <button
                                                                                    class="btn border dropdown-toggle w-100"
                                                                                    type="button"
                                                                                    id="invoice-options-btn"
                                                                                    data-toggle="dropdown"
                                                                                    aria-haspopup="true"
                                                                                    aria-expanded="false">
                                                                                    Sort
                                                                                </button>
                                                                                <div
                                                                                    class="dropdown-menu dropdown-menu-right py-0 my-0 custom-dropdown"
                                                                                    aria-labelledby="invoice-options-btn"
                                                                                    @click="stopPropagation">
                                                                                    <div class="col-12 pl-2 pt-1">
                                                                                        <div
                                                                                            class="d-inline-flex w-100">
                                                                                            <h6 class="py-0 my-0">
                                                                                                Sort</h6>
                                                                                            <span
                                                                                                class="primary pl-20 ml-2 pointer"
                                                                                                @click="resetSort">Reset</span>
                                                                                        </div>
                                                                                        <div
                                                                                            class="align-items-center text-base pt-1">
                                                                                            <p class="tag">
                                                                                                <input type="checkbox"
                                                                                                       name="date"
                                                                                                       v-model="query.date"
                                                                                                       id="date"><label
                                                                                                class="pl-1"
                                                                                                for="date">date</label>
                                                                                            </p>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div
                                                                                        class="dropdown-divider py-0 my-0"></div>
                                                                                    <div
                                                                                        class="col-12 pl-2 d-inline-flex">
                                                                                        <p class="pt-1">
                                                                                            <button type="button"
                                                                                                    id="asce"
                                                                                                    @click="sort('asc')"
                                                                                                    class=" btn btn-sm btn-primary font-small font-weight-normal stock-order">
                                                                                                Asc
                                                                                            </button>
                                                                                        </p>
                                                                                        <p class="pt-1 pl-3">
                                                                                            <button type="button"
                                                                                                    id="desc"
                                                                                                    @click="sort('desc')"
                                                                                                    class=" btn btn-sm btn-light-secondary font-small font-weight-normal stock-order">
                                                                                                Desc
                                                                                            </button>
                                                                                        </p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="actions action-btns d-flex align-items-center flex flex-wrap mr-1">
                                                                            <a href="#">
                                                                                <button
                                                                                    class="btn border px-1 line-height font-small font-weight-normal"
                                                                                    type="button">
                                                                                    <i class="bx bx-xs bx-upload pr-0.5 pb-0.5"></i><span
                                                                                    class="pl-0.5 pt-3">Export</span>
                                                                                </button>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 pr-0">
                                                    <div class="card pr-0 pb-0 mb-1">
                                                        <div class="card-content">
                                                            <div class="table-responsive">
                                                                <table class="table table-hover mb-0">
                                                                    <thead>
                                                                    <tr>
                                                                        <th class="text-left py-0 my-0 text-truncate t-header">
                                                                            ID
                                                                        </th>
                                                                        <th class="py-0 my-0 text-truncate t-header text-center">
                                                                            URL
                                                                        </th>
                                                                        <th class="text-left py-0 my-0 text-truncate t-header text-center">
                                                                            Amount
                                                                        </th>
                                                                        <th class="text-left py-0 my-0 text-truncate t-header">
                                                                            date
                                                                        </th>
                                                                        <th class="py-0 my-0 text-truncate t-header text-center">
                                                                            Status
                                                                        </th>
                                                                        <th class="text-right py-0 my-0 text-truncate t-header px-0 mx-0">
                                                                        </th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    <tr v-for="(payment, index) in requests.data"
                                                                        class="py-0 my-0 px-0 mx-0">
                                                                        <td class="text-left small cursor-pointer py-0 my-0 text-truncate">
                                                                            {{ payment.id }}
                                                                        </td>
                                                                        <td class="small py-0 my-0 text-truncate text-center">
                                                                            {{ payment.url }}
                                                                        </td>
                                                                        <td class="small text-center py-0 my-0 text-truncate">
                                                                            {{ payment.amount_paid ?  payment.amount_paid : 0}}
                                                                        </td>
                                                                        <td class="small text-left py-0 my-0 text-truncate">
                                                                            {{ formatDate(payment.created_at) }}
                                                                        </td>
                                                                        <td class="small py-0 my-0 text-truncate text-center">
                                                                            <span v-if="payment.amount_paid"
                                                                                class="badge badge-light-success badge-pill">PAID</span>
                                                                            <span v-else
                                                                                  class="badge badge-light-danger badge-pill">UNPAID</span>
                                                                        </td>
                                                                        <td class="text-right text-small action-transfer pr-1">
                                                                              <span
                                                                                  class="d-inline-flex align-items-center">
                                                                                	&nbsp;
                                                                                  <inertia-link
                                                                                      href="#">
                                                                                      <span
                                                                                          class="badge-circle badge-circle-light-secondary ">
                                                                                         <i class="bx bx-edit font-medium-1 align-items-center text-center"></i>
                                                                                      </span>
                                                                                 </inertia-link>
                                                                              </span>
                                                                        </td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 ">
                                                <pagination :links="requests.links"
                                                            class="float-right"></pagination>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <Toastr v-if="success" :message="message" :type="type"></Toastr>
                    <div class="col-lg-3 col-xl-3 col-md-6 col-12">
                        <div class="card mb-2">
                            <div class="card-content">
                                <div class="card-body py-2 px-2">
                                    <div class="row">
                                        <div class="col-md-12 form-group py-0">
                                            <div>
                                                Total Requested URL
                                                <span
                                                    class="float-right">{{
                                                        total_requests
                                                    }}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-12 form-group py-0 my-0">
                                            <div>
                                                Remaining Free For Month
                                                <span
                                                    class="float-right">{{
                                                        remains_free
                                                    }}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-12 form-group py-0 my-0">
                                            <div class="pt-1">
                                                Remaining Paid Requests
                                                <span
                                                    class="float-right">{{
                                                        remains_paid
                                                    }}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-12 form-group py-0 my-0">
                                            <div class="pt-1">
                                                Total Remaining
                                                <span
                                                    class="float-right">{{
                                                        remains_free + remains_paid
                                                    }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body px-2 py-2">
                                    <div class="row">
                                        <div class="col-md-12 form-group py-0">
                                            <div class="position-relative has-icon-left">
                                                <inertia-link href="#">
                                                    <span
                                                        class="btn btn-primary btn-lg btn-block text-small">Edit</span>
                                                </inertia-link>
                                            </div>
                                        </div>
                                        <div class="col-md-12 form-group py-0 my-0">
                                            <div class="position-relative has-icon-left">
                                                <Link class="btn btn-light-primary btn-lg btn-block text-small"
                                                      :href="route('subscription.create')">
                                                    Add Payment
                                                </Link>
                                            </div>
                                        </div>
                                    </div>
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
import Pagination from "../../admin/Pagination";
import Toastr from "../../components/Toastr";
import { Link, usePage } from '@inertiajs/inertia-vue3'

export default {
    name: "Show",
    props: ['customer', 'requests', 'params', 'remains_free', 'total_requests', 'remains_paid'],

    components: {
        Label,
        AdminLayout,
        JetInputError,
        Pagination,
        Toastr,
        Link
    },
    data() {
        return {
            form: this.$inertia.form({
                tran_id: '',
                customer_id: '',
                amount: '',
                type: '',
                date_paid: '',
            }),
            query: {
                query: '',
                id: false,
                first_name: false,
                date: false,
                amount_sent: false,
                direction: null,
                paid: false,
                un_paid: false,
                partially_paid: false,
                page: 1,
                transfer_request: true
            },
            data: {
                id: this.customer.id,
                title: this.customer.title,
                first_name: this.customer.first_name,
                middle_name: this.customer.middle_name,
                surname: this.customer.surname,
                email_address: this.customer.email_address,
                work_no: this.customer.work_no,
                house_no: this.customer.house_no,
                address1: this.customer.address1,
                address2: this.customer.address2,
                status: (this.customer.excellent ? 'Excellent' : this.customer.good ? 'Good' : 'Bad'),
                supplier: (this.customer.hafiz ? 'Hafiz' : this.customer.ria ? 'Ria' : ''),
                town: this.customer.town,
                county: this.customer.county,
                post_code: this.customer.post_code,
                home_no: this.customer.home_no,
                mobile_no: this.customer.mobile_no,
                dob: this.customer.dob,
                notes: this.customer.notes,
                imagepath1: this.customer.image_path1,
                imagepath2: this.customer.image_path2,
                imagepath3: this.customer.image_path3,
                imagepath4: this.customer.image_path4,
                total: null,

            },
            cheques_tab: true,
            pins_tab: false,
            transfers_tab: true,
            payments_tab: false,
            id: null,
            receiver_id: null,
            pin_id: null,
            show: null,
            cus_query: '',
            customers: [],
            trans_id: null,
            error: false,
            tran_id: '',
            show_payment: true,
            success: false,
            message: '',
            type: '',
            paymentParams: '',
            payment_show: false,
            paymentCustomeId: '',
            imagePath: '',
            imageType: ''
        }
    },
    beforeMount() {
        console.log("aaaaaaa", this.payments)
        document.title = process.env.MIX_APP_NAME + " - Show Customer";
    },
    mounted() {
        this.payment_show = true;
        this.success = false;
        var date = new Date();
        var currentDate = date.toISOString().slice(0, 10);
        this.form.date_paid = currentDate;
        if (this.params) {
            if (this.params.hasOwnProperty('payment_table')) {
                this.paymentParams = this.params;
            } else {
                let params = Object.keys(this.params);
                for (let i of params) {
                    Object.assign(this.query, {[i]: this.params[i]});
                }
            }
        }
    },
    methods: {
        imageZoom(path, type) {
            this.imagePath = path;
            this.imageType = type
        },
        resetQuery() {
            this.query = {}
            this.loadData()
        },
        loadedData(id) {
            if (this.$inertia.page.props.errorBags) {
                this.$inertia.page.props.errorBags.default = {}
            }
            this.form.customer_id = id;
        },
        submit() {
            var obj = this;
            this.form.post('/payments').then((response) => {
                if (Object.keys(this.$inertia.page.props.errors).length === 0) {
                    $('#modal-hide').trigger('click');
                    this.show_payment = true;
                    this.success = true
                    this.message = 'Payment Created successfully';
                    this.type = 'success';

                    setTimeout(function () {
                        obj.success = false;
                    }, 5100)
                }
            });
        },
        formatDate(date) {
            return moment(date).format('DD/MM/YYYY')
        },
        stopPropagation(e) {
            e.stopPropagation();
        },

        showTooltip(id) {
            if (this.id == null) {
                this.id = id;
                $("[data-toggle=" + id + "]").popover({
                    html: true,
                    content: function () {
                        return $('#popover-content-' + id).html();
                    }
                });
                $("[data-toggle=" + id + "]").popover('show')
            } else if (this.id == id) {
                $("[data-toggle=" + this.id + "]").popover('dispose');
                this.id = null;
            } else {
                $("[data-toggle=" + this.id + "]").popover('dispose');
                this.id = id;
                $("[data-toggle=" + id + "]").popover({
                    html: true,
                    content: function () {
                        return $('#popover-content-' + id).html();
                    }
                });
                $("[data-toggle=" + id + "]").popover('show')
            }
        },
        hideTooltip(id) {
            $("[data-toggle=" + this.id + "]").popover('dispose');
            $("[data-toggle=receiver" + this.receiver_id + "]").popover('dispose');
            $("[data-toggle=pins" + this.pins + "]").popover('dispose');
            this.receiver_id = null;
            this.pins = null;
            this.id = null;
        },

        resetSort(e) {
            this.query.id = '';
            this.query.rel_first_name = '';
            this.query.date = '';
            this.query.amount_sent = '';
            this.query.direction = '';
            this.query.page = '';
            this.loadData();
        },
        resetFilter(e) {
            this.query.paid = '';
            this.query.un_paid = '';
            this.query.partially_paid = '';
            this.query.direction = '';
            this.query.page = '';
            this.loadData();
        },
        search() {
            this.loadData()
        },
        filter() {
            this.loadData();
        },
        sumAmountSent(transfer) {
            return (parseFloat(transfer.amount_sent) + parseFloat(transfer.inc_charge ? transfer.inc_charge : 0) + (transfer.nxt_day_charge == null ? 0 : parseFloat(transfer.nxt_day_charge))).toFixed(2);
        },
        sort(direction) {
            this.query.direction = direction;
            this.loadData();
        },
        loadData() {
            let query = {};
            let filter = [];

            if (this.query.query) {
                Object.assign(query, {'query': this.query.query})
            }
            if (this.query.id) {
                Object.assign(query, {'id': this.query.id})
            }
            if (this.query.first_name) {
                Object.assign(query, {'first_name': this.query.first_name})
            }
            if (this.query.date) {
                Object.assign(query, {'date': this.query.date})
            }
            if (this.query.amount_sent) {
                Object.assign(query, {'amount_sent': this.query.amount_sent})
            }
            if (this.query.direction) {
                Object.assign(query, {'direction': this.query.direction})
            }
            if (this.query.paid) {
                Object.assign(query, {'paid': this.query.paid});
            }
            if (this.query.un_paid) {
                Object.assign(query, {'un_paid': this.query.un_paid});
            }
            if (this.query.partially_paid) {
                Object.assign(query, {'partially_paid': this.query.partially_paid});
            }
            if (this.query.page) {
                Object.assign(query, {'page': this.query.page});
            }
            if (this.query.transfer_request) {
                Object.assign(query, {'transfer_request': this.query.transfer_request});
            }
            this.$inertia.visit(route('customers.show', this.customer.id), {
                method: 'get',
                data: {
                    ...query
                }
            })
        },
    },
}
</script>

<style scoped>
.pinss {
    margin-top: -12px !important;

}

.t-header {
    padding-top: 10px !important;
    padding-bottom: 10px !important;
}

.bx-download:before {
    content: "\ea86";
}

.download-btn {
    font-size: 15px !important;
}

.action {
    padding-top: 4px !important;
    padding-bottom: 4px !important;
}

.action-transfer {
    padding-top: 10px !important;
    padding-bottom: 10px !important;
}

.img {
    border: none !important;
    border-radius: 0px !important;
}

.table-font {
    font-size: small !important;
}

.card {
    border: 1px solid #d2d6dc;
    border-radius: 0px !important;
    height: auto !important;
}

.card-one {
    border: 1px solid #d2d6dc;
    border-bottom: 0px;
}

table thead th {
    vertical-align: bottom;
    border-bottom: 1px solid #d2d6dc;
}

.container {
    padding: 0px;
}

.popover-content h4 {
    color: #00A1FF;
}

.popover-content h4 small {
    color: black;
}

.popover-content button.btn-primary {
    color: #00A1FF;
    border-color: #00A1FF;
    background: white;
}

.popover-content button.btn-default {
    color: gray;
    border-color: gray;
}

.custom-dropdown {
    margin-top: 0.5rem !important;
}

.input-group-text {
    padding: 0px !important;
    padding-left: 10px !important;
    padding-right: 10px !important;
}

.line {
    border-top: 1px dashed #C7CFD6;
    width: 100%;
}

.row-bg-color {
    background-color: #F2F4F4;
}

tr.spaceUnder > td {
    padding-bottom: 1em;
}

.image-card {
    border: 1px solid #d2d6dc;
    border-radius: 0px !important;
}

.image {
    width: auto !important;
    height: 89px !important;
}

.error {
    margin-top: 0px !important;
}

.pins-tooltip {
    margin-top: 8px !important;
}

@media (max-width: 1199px) {
    .text-small {
        font-size: 11px !important;
    }

    .text-document {
        font-size: 8px !important;
    }

    .contact-info {
        padding-left: 14px !important;
    }
}

@media (min-width: 1200px) {
    .text-small {
        font-size: 14px !important;
    }
}

</style>
