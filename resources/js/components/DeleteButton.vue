<template>
    <div>
        <a href="#" class="btn btn-sm btn-danger admin-btn-table" @click="swalConfirm">Удалить</a>

        <form :action="url + id" method="post" ref="delete_form">
            <input type="hidden" name="_token" :value="csrf">
            <input type="hidden" name="id" v-model="id">
        </form>
    </div>
</template>

<script>
    import Swal from 'sweetalert2'

    export default {
        data() {
            return {
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                id: null,
            }
        },
        mounted() {
            this.id = this._id;
        },
        props: ['_id', 'url'],
        methods: {
            swalConfirm() {
                Swal.fire({
                    title: 'Вы уверены?',
                    text: 'Вы уверены что хотите удалить элемент #' + this.id,
                    icon: 'warning',
                    showCancelButton: 'true',
                    confirmButtonText: 'Да',
                    cancelButtonText: 'Отменить',
                }).then((object) => {
                    if (object.isConfirmed)
                        this.$refs.delete_form.submit();
                });
            }
        }
    }
</script>
