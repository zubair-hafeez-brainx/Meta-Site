<template>
    <div>
        <div class="header-navbar-shadow"></div>
        <nav class="header-navbar main-header-navbar navbar-expand-lg navbar navbar-with-menu fixed-top ">
            <div class="navbar-wrapper page-color">
                <div class="navbar-container content">
                    <div class="navbar-collapse" id="navbar-mobile">
                        <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                            <ul class="nav navbar-nav">
                                <li class="nav-item mobile-menu d-xl-none mr-auto"><a
                                    class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i
                                    class="ficon bx bx-menu"></i></a></li>
                            </ul>
                            <!--                            <form class="needs-validation" novalidate="">-->
                            <!--                                <div class="form-row px-0 mx-0">-->
                            <!--                                    <div class="col-12 nav navbar-nav float-right">-->

                            <!--                                        <fieldset class="form-group position-relative mt-1">-->
                            <!--                                            <input type="text" class="form-control" id="iconLeft2"-->
                            <!--                                                   placeholder="Search Something...">-->
                            <!--                                            <div class="form-control-position">-->
                            <!--                                                <i class="bx bx-search"></i>-->
                            <!--                                            </div>-->
                            <!--                                        </fieldset>-->
                            <!--                                    </div>-->
                            <!--                                </div>-->

                            <!--                            </form>-->
                        </div>
                        <div class="text-right">
                            <ul class="nav navbar-nav float-right">
                                <li class="dropdown dropdown-user nav-item"><a
                                    class="dropdown-toggle nav-link dropdown-user-link" href="#"
                                    data-toggle="dropdown">
                                    <div class="user-nav d-sm-flex d-none"><span
                                        class="user-name">{{ user.name }}</span>
                                    </div>
                                    <span><img class="rounded-circle p-image" :src="profile_photo_url" alt="avatar"
                                               height="40"
                                               width="40"></span>
                                </a>

                                    <div class="dropdown-menu dropdown-menu-right pb-0">
                                        <Link class="dropdown-item" :href="route('users.edit',user.id)"><i
                                            class="bx bx-user mr-50"></i> Edit Profile
                                        </Link>
                                        <div class="dropdown-divider mb-0"></div>
                                        <form method="POST" @submit.prevent="logout">
                                            <button as="button" class="dropdown-item">
                                                <i class="bx bx-power-off mr-50"></i> Logout
                                            </button>
                                        </form>
                                    </div>


                                    <!--                                    <div class="dropdown-menu dropdown-menu-right pb-0">-->
                                    <!--                                        <form method="POST" @submit.prevent="logout">-->
                                    <!--                                            <button as="button" class="dropdown-item">-->
                                    <!--                                                <i class="bx bx-power-off mr-50"></i> Logout-->
                                    <!--                                            </button>-->
                                    <!--                                        </form>-->
                                    <!--                                    </div>-->
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </nav>
    </div>
</template>

<script>
import JetResponsiveNavLink from './../Jetstream/ResponsiveNavLink'
import Button from "../Jetstream/Button";
import {computed} from 'vue'
import {usePage, Link} from '@inertiajs/inertia-vue3'

export default {
    name: "Header",
    components: {
        Button,
        Link,
        JetResponsiveNavLink
    },
    setup() {
        const user = computed(() => usePage().props.value.user);
        return {user}
    },
    data() {
        return {
                profile_photo_url: this.user.profile_photo_path ? '/' + this.user.profile_photo_path : '/img/avator.jpg'
        }
    },
    methods: {
        logout() {
            axios.post(route('logout')).then(response => {
                window.location = '/';
            })
        },
    }
}
</script>

<style scoped>
.p-image {
    width: 40px !important;
    height: 40px !important;
}
</style>
