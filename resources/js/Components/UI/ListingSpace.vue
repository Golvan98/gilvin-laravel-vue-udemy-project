<template>

    <div>
       <span class="font-bold"> {{ listing.beds }} </span> bds | 
       <span class="text-gray-400"> {{ listing.baths }}</span> ba |
       <span class="text-gray-800"> {{ listing.area }}</span> m2 
    </div>

</template>


<script setup>
    
defineProps({ 
    listing: Object,
           })


</script>