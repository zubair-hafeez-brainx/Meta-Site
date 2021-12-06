<template>
    <div v-if="hasError">
        <span class="mt-3 list-disc list-inside text-sm text-red-600">
            {{ error }}
        </span>
    </div>
</template>

<script>
export default {
    name: "ErrorComponent",
    props: ['input'],
    computed: {
        errors() {
            return this.$page.props.errors
        },

        hasError() {
            return Object.keys(this.errors).indexOf(this.input) > -1;
        },
        error() {
            return this.errors[this.input];
        }
    }
}
</script>

<style scoped>

</style>
