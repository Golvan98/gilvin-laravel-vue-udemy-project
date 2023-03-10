<template>

        <div v-for="listing in listings" :key="listing.id">

                <Link :href="route('listing.show', {listing: listing.id})">

                        <ListingAddress :listing="listing"/>

                 </Link>

              <div> 
                     <Link :href ="route('listing.edit', {listing: listing.id})"> Edit </Link>
              </div>

              <div> 
                     <Link :href="route('listing.destroy', {listing: listing.id})" method="DELETE" as="button"> Delete </Link> 
              </div> 
                
        </div>
    
    </template>
        
        <script setup>
        
        import ListingAddress from '@/Components/ListingAddress.vue';
        import {Link} from '@inertiajs/vue3'    
       import { reactive } from 'vue'
       import { useForm } from '@inertiajs/inertia-vue3'
        defineProps({ 
            listings: Object,
                   })
        
        
        </script>
       <style scoped>
       .success{
           background-color: green;
           color:black;
           padding: 2px;
           margin-right: 2em;
       }

   </style>