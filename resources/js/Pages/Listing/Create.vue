<template>
   <form @submit.prevent="create">
  <div class="grid grid-cols-6 gap-4">
    <div class="col-span-2">
      <label class="label">Beds</label>
      <input v-model.number="form.beds" type="text" class="input"/>
      <div v-if="errors.beds" class="input-error">
        {{  errors.beds }}
      </div>
    </div>

    <div class="col-span-2">
      <label class="label"> Baths</label>
      <input v-model.number="form.baths" type="text" class="input"/>
      <div v-if="errors.baths" class="input-error">
        {{  errors.baths }}
      </div>
    </div>

    <div class="col-span-2">
      <label class="label"> Area </label>
      <input v-model.number="form.area" type="text" class="input"/>
      <div v-if="errors.area" class="input-error">
        {{  errors.area }}
      </div>
    </div>

    <div class="col-span-4">
      <label class="label"> City</label>
      <input v-model="form.city" type="text" class="input"/>
      <div v-if="errors.city" class="input-error">
        {{  errors.city }}
      </div>
    </div>

    <div class="col-span-2">
      <label class="label"> Post Code</label>
      <input v-model="form.code" type="text" class="input"/>
      <div v-if="errors.code" class="input-error">
        {{  errors.code }}
      </div>
    </div>

    <div class="col-span-4">
      <label class="label"> Street</label>
      <input v-model="form.street" type="text" class="input"/>
      <div v-if="errors.street" class="input-error">
        {{  errors.street }}
      </div>
    </div>

    <div class="col-span-2">
      <label class="label"> street_nr</label>
      <input v-model.number="form.street_nr" type="text" class="input"/>
      <div v-if="errors.street_nr" class="input-error">
        {{  errors.street_nr }}
      </div>
    </div>

    <div class="col-span-6">
      <label class="label"> Price </label>
      <input v-model.number="form.price" type="text" class="input"/>
      <div v-if="errors.price" class="input-error">
        {{  errors.price }}
      </div>
    </div>

    <div class="col-span-6">
      <button type="submit" class="primary-btn" >Create</button>
    </div>
  </div>
</form>
  </template>
  

  <script setup>
import { reactive } from 'vue'
 
import { useForm } from '@inertiajs/inertia-vue3'
defineProps({ errors: Object })


    const form = useForm({

            beds:0, baths: 0, area:0, city:null, code:null, street_nr: null, price:0 , street:null 
                         })

    const create = () => form.post(route('listing.store'))   
    

  </script>

  <style scoped>
  label {
    margin-right: 2em;
  }
  
  div {
    padding: 2px
  }
  </style>