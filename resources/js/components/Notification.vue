<template>
    <notifications></notifications>
</template>

<script>
    export default {
        props: ['title', 'text', 'type'],
        mounted() {
            this.$notify({
                title: this.title,
                text: this.text,
                type: this.type,
            });
        }
    }
</script>
