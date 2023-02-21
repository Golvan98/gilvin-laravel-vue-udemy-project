<template>

<div> {{ listing.city }} , {{ listing.street }} for ${{  listing.price }} </div>



</template>

<script setup>
    
defineProps({ 
    listing: Object,
           })


</script>