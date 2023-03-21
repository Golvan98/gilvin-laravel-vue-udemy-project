<template>
   <form @submit.prevent="create">
  <div class="grid grid-cols-6 gap-4">
    <div class="col-span-2">
      <label class="block mb-1 text-gray-500 dark:text-gray-300">Beds</label>
      <input v-model.number="form.beds" type="text" class="block w-full p-2 rounded-md shadow-sm border border-gray-300 dark:border-gray-600 text-gray-500"/>
      <div v-if="errors.beds">
        {{  errors.beds }}
      </div>
    </div>

    <div class="col-span-2">
      <label class="block mb-1 text-gray-500 dark:text-gray-300"> Baths</label>
      <input v-model.number="form.baths" type="text" class="block w-full p-2 rounded-md shadow-sm border border-gray-300 dark:border-gray-600 text-gray-500"/>
      <div v-if="errors.baths">
        {{  errors.baths }}
      </div>
    </div>

    <div class="col-span-2">
      <label class="block mb-1 text-gray-500 dark:text-gray-300"> Area </label>
      <input v-model.number="form.area" type="text" class="block w-full p-2 rounded-md shadow-sm border border-gray-300 dark:border-gray-600 text-gray-500"/>
      <div v-if="errors.area">
        {{  errors.area }}
      </div>
    </div>

    <div class="col-span-4">
      <label class="block mb-1 text-gray-500 dark:text-gray-300"> City</label>
      <input v-model="form.city" type="text" class="block w-full p-2 rounded-md shadow-sm border border-gray-300 dark:border-gray-600 text-gray-500"/>
      <div v-if="errors.city">
        {{  errors.city }}
      </div>
    </div>

    <div class="col-span-2">
      <label class="block mb-1 text-gray-500 dark:text-gray-300"> Post Code</label>
      <input v-model="form.code" type="text" class="block w-full p-2 rounded-md shadow-sm border border-gray-300 dark:border-gray-600 text-gray-500"/>
      <div v-if="errors.code">
        {{  errors.code }}
      </div>
    </div>

    <div class="col-span-4">
      <label class="block mb-1 text-gray-500 dark:text-gray-300"> Street</label>
      <input v-model="form.street" type="text" class="block w-full p-2 rounded-md shadow-sm border border-gray-300 dark:border-gray-600 text-gray-500"/>
      <div v-if="errors.street">
        {{  errors.street }}
      </div>
    </div>

    <div class="col-span-2">
      <label class="block mb-1 text-gray-500 dark:text-gray-300"> street_nr</label>
      <input v-model.number="form.street_nr" type="text" class="block w-full p-2 rounded-md shadow-sm border border-gray-300 dark:border-gray-600 text-gray-500"/>
      <div v-if="errors.street_nr">
        {{  errors.street_nr }}
      </div>
    </div>

    <div class="col-span-6">
      <label class="block mb-1 text-gray-500 dark:text-gray-300"> Price </label>
      <input v-model.number="form.price" type="text" class="block w-full p-2 rounded-md shadow-sm border border-gray-300 dark:border-gray-600 text-gray-500"/>
      <div v-if="errors.price">
        {{  errors.price }}
      </div>
    </div>

    <div class="col-span-6">
      <button type="submit" class="bg-indigo-600 hover:bg-indigo-500 rounded-md text-white p-2 font-bold" >Create</button>
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