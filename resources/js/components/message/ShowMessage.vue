<template>
    <div class="alert alert-light">
        Message will be deleted in: {{ expired_at }}
    </div>
</template>

<script>
    export default {

        props: ['expired_at'],

        data(){
            return {
               'text': '',
               'expired_at':''
            }
        },

        mounted() {
            console.log(this.$route.params)
            console.log('Component mounted.')
        },
        methods: {
        }

    }
</script>
