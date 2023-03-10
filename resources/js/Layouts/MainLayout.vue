<template>

<div><Link href="/listing"> Index Page </Link> &nbsp;</div>
<div><Link href="/listing/create"> Create Listing </Link> </div>

<div v-if="flashSuccess" class="success">
        {{ flashSuccess }}
</div>


otentest
<slot></slot>
<br>
otenyawa
</template>

<script setup>
import { computed } from 'vue'
import { Link, usePage } from '@inertiajs/vue3'
import { ref } from 'vue'

const flashSuccess = computed(() => page.props.flash.success)



const page = usePage()



/* const timer = ref(0) <div> Current Session {{ timer }}</div>
setInterval(() => timer.value++, 1000) */

</script>

<style scoped>
    .success{
        background-color: green;
        color:black;
    }
    .error{
        background-color: red;
        color:black;
    }
</style>

