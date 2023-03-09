<template>
    <form @submit.prevent="update">
   <div>
     <div>
       <label>Beds</label>
       <input v-model.number="form.beds" type="text" />
       <div v-if="errors.beds">
         {{  errors.beds }}
       </div>
     </div>
 
     <div>
       <label>Baths</label>
       <input v-model.number="form.baths" type="text" />
       <div v-if="errors.baths">
         {{  errors.baths }}
       </div>
     </div>
 
     <div>
       <label>Area</label>
       <input v-model.number="form.area" type="text" />
       <div v-if="errors.area">
         {{  errors.area }}
       </div>
     </div>
 
     <div>
       <label>City</label>
       <input v-model="form.city" type="text" />
       <div v-if="errors.city">
         {{  errors.city }}
       </div>
     </div>
 
     <div>
       <label>Post Code</label>
       <input v-model="form.code" type="text" />
       <div v-if="errors.code">
         {{  errors.code }}
       </div>
     </div>
 
     <div>
       <label>Street</label>
       <input v-model="form.street" type="text" />
       <div v-if="errors.street">
         {{  errors.street }}
       </div>
     </div>
 
     <div>
       <label>Street Nr</label>
       <input v-model.number="form.street_nr" type="text" />
       <div v-if="errors.street_nr">
         {{  errors.street_nr }}
       </div>
     </div>
 
     <div>
       <label>Price</label>
       <input v-model.number="form.price" type="text" />
       <div v-if="errors.price">
         {{  errors.price }}
       </div>
     </div>
 
     <div>
       <button type="submit">Edit Listing</button>
     </div>
   </div>
 </form>
   </template>
   
 
   <script setup>
 import { reactive } from 'vue'
  
 import { useForm } from '@inertiajs/inertia-vue3'
 
 
 const props = defineProps({ listing:Object, errors:Object})
 
     const form = useForm({
 
            beds: props.listing.beds,
            baths: props.listing.baths,
            area:props.listing.area,
            city:props.listing.city, 
            code:props.listing.code,
            street_nr: props.listing.street_nr,
            price:props.listing.price ,
            street:props.listing.street
                          })
 
     const update = () => form.put(route('listing.update', {listing: props.listing.id}))   
     
 
   </script>
 
   <style scoped>
   label {
     margin-right: 2em;
   }
   
   div {
     padding: 2px
   }
   </style>