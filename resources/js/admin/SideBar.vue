<template>
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto"><a class="navbar-brand" href="../../../html/ltr/vertical-menu-boxicons-template/index.html">
<!--                    <div class="brand-logo"><img class="logo" src="../../../app-assets/images/logo/logo.png" /></div>-->
                    <h2 class="brand-text mb-0">TinyURL</h2>
                </a></li>
                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="bx bx-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon bx bx-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="bx-disc"></i></a></li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation" data-icon-style="">
                <li :class="currentRoute === 'dashboard' ? 'active nav-item ':'nav-item'">
                    <Link :href="route('dashboard')">
                        <i class="bx bx-home-alt"></i>
                        <span class="menu-title" data-i18n="Dashboard">Dashboard</span>
                    </Link>
                </li>
                <li class=" navigation-header"><span>User</span>
                </li>
                <li :class="currentRoute === 'requests.show' ? 'active nav-item ':'nav-item'">
                    <Link :href="route('requests.show')">
                        <i class="bx bx-globe"></i>
                        <span class="menu-title" data-i18n="Chat">Requests</span>
                        <span class="badge badge-light-primary badge-pill badge-round float-right">New</span>
                    </Link>
                </li>
                <li :class="currentRoute === 'payments.show' || currentRoute === 'subscription.create'  ? 'active nav-item ':'nav-item'">
                    <Link :href="route('payments.show')">
                        <i class="bx bx-money"></i>
                        <span class="menu-title" data-i18n="Chat">Payments</span>
                    </Link>
                </li>
                <li :class="currentRoute === 'subscription.index' ? 'active nav-item ':'nav-item'">
                    <Link :href="route('subscription.index')">
                        <i class="bx bxs-collection"></i>
                        <span class="menu-title" data-i18n="Chat">Subscriptions</span>
                    </Link>
                </li>
                <li class=" navigation-header"><span>Admin</span>
                </li>
                <li :class="currentRoute === 'users.index' ? 'active nav-item ':'nav-item'">
                    <Link :href="route('users.index')">
                    <i class="bx bx-user"></i>
                    <span class="menu-title" data-i18n="Charts">Users</span>
                    <span class="badge badge-pill badge-round badge-light-success float-right mr-2">3</span>
                    </Link>
                </li>
                <li :class="currentRoute === 'settings.index' || currentRoute === 'settings.create' || currentRoute === 'settings.edit' ? 'active nav-item ':'nav-item'">
                    <Link :href="route('settings.index')">
                        <i class="bx bxs-cog"></i>
                        <span class="menu-title" data-i18n="Chat">Settings</span>
                    </Link>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
import { Link, usePage } from '@inertiajs/inertia-vue3'
export default {
    name: "SideBar",
    components: {
        Link,
        usePage
    },
    mounted() {
    },
    computed: {
        currentRoute() {
            return route().current();
        }
    },
}
</script>

<style scoped>

</style>
