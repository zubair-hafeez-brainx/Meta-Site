<template>
    <div v-if="passwordConfirmation" class="swal2-container swal2-center swal2-fade swal2-shown"
         style="overflow-y: auto;">
        <div aria-labelledby="swal2-title" aria-describedby="swal2-content"
             class="swal2-popup swal2-modal swal2-show" tabindex="-1" role="dialog" aria-live="assertive"
             aria-modal="true" style="display: flex;">
            <div class="row form-group">
                <div class="col-md-12">
                    <label>Please enter your passsword *</label>
                </div>
                <div class="col-md-12 form-group">
                    <input v-model="password" :type="passwordType" id="text" @click="changeType"
                           class="form-control"
                           name="password">
                    <p class="text-danger" v-if="errorMessage">Password must be minimum 8 character</p>
                </div>
            </div>

            <div class="row confirm-action text-right">
                <div class="col-md-12">
                    <button type="button" class="swal2-cancel btn btn-light-secondary  ml-1" aria-label=""
                            style="display: inline-block;" @click="CancelDeleteFile">Cancel
                    </button>
                    <button type="button" class="swal2-confirm btn btn-danger ml-1" aria-label=""
                            @click="confirmDelete">
                        Delete
                    </button>
                </div>
            </div>
        </div>

    </div>

</template>

<script>
import Input from "../../Jetstream/Input";

export default {
    name: "PasswordConfirmationModal",
    components: {Input},
    props: ['passwordConfirmation'],
    data() {
        return {
            password: '',
            errorMessage: false,
            passwordType: 'text',
        }
    },
    methods: {
        CancelDeleteFile() {
            this.$emit('clicked');
        },
        confirmDelete() {
            this.errorMessage = false;
            if (this.password.length < 8) {

                return this.errorMessage = true;
            } else {
                this.$emit('deleteitem', this.password)
            }

        },
        changeType() {
            this.passwordType = 'password';
        }
    }
}
</script>

<style scoped>

</style>
