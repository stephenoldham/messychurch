<template>
    <div class="editable">
        {{ value }}
    </div>
</template>

<script>
    export default {
        props: [
            'item',
            'name'
        ],

        computed: {
            value: function(){
                return this.item[this.name];
            }
        },

        mounted() {
            console.log('Component mounted.')
        },
    }
</script>
