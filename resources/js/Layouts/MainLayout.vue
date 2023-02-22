<template>

<div><Link href="/"> Index Page </Link> </div>
<div><Link href="/hello"> Show Page </Link> </div>


<div> Current Session {{ timer }}</div>

oten
<slot></slot>
<br>
oten
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
import { ref } from 'vue'


/* const timer = ref(0)
setInterval(() => timer.value++, 1000) */

</script>

