<template>

<div><Link href="/"> Index Page </Link> </div>
<div><Link href="/hello"> Show Page </Link> </div>

<div v-if="$page.props.flash.success" class="success">
            {{  $page.props.flash.success }}
</div>


otentest
<slot></slot>
<br>
otenyawa
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
import { ref } from 'vue'

import { usePage } from '@inertiajs/inertia-vue3';

const page = usePage()

/* const timer = ref(0) <div> Current Session {{ timer }}</div>
setInterval(() => timer.value++, 1000) */

</script>

<style scoped>
    .success{
        background-color: green;
        color:white;
    }

</style>

