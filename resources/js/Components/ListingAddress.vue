<template>

<div> {{ listing.city }} , {{ listing.street }} for  </div>



</template>

<script setup>
    
defineProps({ 
    listing: Object,
           })


</script>