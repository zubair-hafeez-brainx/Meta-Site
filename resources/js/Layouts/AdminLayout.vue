<template>
    <div class="vh-100 page-color">
        <div class="pace pace-inactive">
            <div class="pace-progress" data-progress-text="100%" data-progress="99"
                 style="transform: translate3d(100%, 0px, 0px);">
                <div class="pace-progress-inner"></div>
            </div>
            <div class="pace-activity"></div>
        </div>
        <div>
            <Header></Header>
            <SideBar></SideBar>
        </div>
        <div class="app-content content">
            <div class="content-overlay"></div>
            <main class="content-wrapper page-color">
                <toastr :type="flash.type" :message="flash.message" v-if="flash"/>
                <slot></slot>
            </main>
        </div>
    </div>
</template>

<script>
import Header from "./../admin/Header";
import SideBar from "../admin/SideBar";
import Toastr from "../components/Toastr";
import {usePage} from '@inertiajs/inertia-vue3'
import {computed} from "vue";

export default {
    name: "AdminLayout",
    setup() {
        const flash = usePage().props.value.flash;
        // const permissions = computed(() => usePage().props.value.auth.permissions);
        return {flash}
    },
    components: {
        Header,
        SideBar,
        Toastr
    },
    beforeMount() {
        // window.permissions = this.permissions
    },
    mounted() {
        let obj = this;
        setTimeout(function () {
            obj.flash = '';
        }, 5100)
    }
}
</script>

