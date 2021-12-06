<template>
    <Head title="Welcome"/>

    <body class="antialiased">
    <div
        class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
        <img src="/img/site-bg.jpg" class="backgroundimage">

        <div class="fixed top-0 right-0 px-6 py-2">
            <Link v-if="user" :href="route('dashboard')" class="btn btn-primary" data-repeater-create="">
                Dashboard
            </Link>
            <div v-else>
                <Link :href="route('login')" class="mr-2 btn " data-repeater-create=""
                      style="background-color: #63D3FE; color: white">
                    Login
                </Link>
                <Link :href="route('register')" class="btn" data-repeater-create=""
                      style="background-color: #63D3FE; color: white">
                    Register
                </Link>
            </div>
        </div>
        <div class="container fixed-top someElement">
            <div class="row">
                <div class="col-lg-12 text-black">
                    <h1 class="text-black font-bold">Get Meta Data From Websites</h1>
                    <p>This metatags will be a SaaS website that provides its users with functionality to get
                        meta tags and content under them of the specified URL and output it in json or specified
                        format for us from different websites.</p>
                </div>
            </div>
        </div>
    </div>
    </body>
</template>

<style scoped>
body {
    font-family: 'Nunito';
}

.someElement {
    position: absolute;
    top: 50%;
    left: 23%;
    width: 700px;
    height: 200px;
    margin: -100px 0 0 -100px;
}

@media (min-width: 280px) {
    .backgroundimage {
        height: 100vh !important;
        width: 280px !important;
        object-fit: cover;
    }
}

@media (min-width: 320px) {
    .backgroundimage {
        height: 100vh !important;
        width: 320px !important;
        object-fit: cover;
    }
}

@media (min-width: 360px) {
    .backgroundimage {
        height: 100vh !important;
        width: 360px !important;
        object-fit: cover;
    }
}

@media (min-width: 375px) {
    .backgroundimage {
        height: 100vh !important;
        width: 375px !important;
        object-fit: cover;
    }
}

@media (min-width: 411px) {
    .backgroundimage {
        height: 100vh !important;
        width: 411px !important;
        object-fit: cover;
    }
}

@media (min-width: 540px) {
    .backgroundimage {
        height: 100vh !important;
        width: 540px !important;
        object-fit: cover;
    }
}

@media (min-width: 768px) {

    .backgroundimage {
        height: 100vh !important;
        width: 768px !important;
        object-fit: cover;
    }
}

@media (min-width: 800px) {
    .backgroundimage {
        height: 100vh !important;
        width: 800px !important;
        object-fit: cover;
    }
}

@media (min-width: 1020px) {
    .backgroundimage {
        height: 100vh !important;
        width: 1020px !important;
        object-fit: cover;
    }
}


@media (min-width: 1200px) {
    .backgroundimage {
        height: 100vh !important;
        width: 1200px !important;
        object-fit: cover;
    }
}


@media (max-width: 2100px) {
    .backgroundimage {
        height: 100vh !important;
        width: 100% !important;
        object-fit: cover;
    }
}

</style>

<script>
import {computed, defineComponent} from 'vue'
import {Head, Link, usePage} from '@inertiajs/inertia-vue3';

export default defineComponent({
    components: {
        Head,
        Link,
    },
    props: {
        canLogin: Boolean,
        canRegister: Boolean,
        laravelVersion: String,
        phpVersion: String,
    },
    setup() {
        const user = computed(() => usePage().props.value.user);
        return {user}
    },
})
</script>
