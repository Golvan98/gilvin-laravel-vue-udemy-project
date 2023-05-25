<template>
    <div class="flex flex-col-reverse md:grid grid-cols-12 gap-4">  

      
        <Box v-if="listing.images.length" class="md:col-span-7 flex items-center w-full"> 
            <div class="grid grid-cols-2 gap-1">
             <img v-for="image in listing.images" :key="image.id"
             :src="image.src"
             />
            </div>
           
        </Box>

        <EmptyState v-else class="md:col-span-7 flex items-center"> No images </EmptyState>

      <div class="md:col-span-5 flex flex-col gap-4">

        

        <Box>
            <template #header> 
            Basic info 
            </template>
            <Price :price="listing.price"/>
            <ListingAddress :listing="listing"/>
            <ListingSpace :listing="listing"/>
        </Box>

        <Box> 
            <template #header> 
                Monthly Payment 
            </template> 
            <div>
                <label class="label"> Interest Rate ({{ interestRate}} %) </label>
                <input v-model.number="interestRate" type="range" min="0.1" max="30" step="0.1" class="w-full h-4 bg-gray-200 rounded-lg appreance-none cursor-pointer dark:bg-gray-700">

                <label class="label"> ({{ duration }} years) </label>
                <input v-model.number="duration" type="range" min="3" max="35" step="1" class="w-full h-4 bg-gray-200 rounded-lg appreance-none cursor-pointer dark:bg-gray-700">

                <div class="text-gray dark:text-gray-300 mt-2">
                    <div class="text-gray-400"> Your monthly payment</div>
                    <Price :price="monthlyPayment" class="text-xl"></Price>
                </div>

                <div class="text-gray-400 mt-2"> 
                    <div class="flex justify-between">
                        <div> Total Paid</div>
                        <div> <Price :price="totalPaid" class="font-medium"/> </div>
                        
                    </div>

                    <div class="flex justify-between">
                        <div> Principal paid</div>
                        <div> <Price :price="listing.price" class="font-medium"/> </div>
                        
                    </div>

                    <div class="flex justify-between">
                        <div> Interest Paid</div>
                        <div> <Price :price="totalInterest" class="font-medium"/> </div>
                        
                    </div>
                </div>
            </div>
           
        </Box>
        <MakeOffer v-if="page.props.user && !offerMade"  @offer-updated="offer = $event" :listing-id="listing.id" :price="listing.price"/>
        <OfferMade v-if="page.props.user && offerMade" :offer="offerMade"/>

      </div>

    </div>                     
</template>
    
    <script setup>

    const page = usePage()
    const flashSuccess = computed(() => page.props.flash.success,)
   
    
    import { computed } from 'vue'
    import { usePage  } from '@inertiajs/vue3'
    import { useForm } from '@inertiajs/vue3'
    import { Link } from '@inertiajs/vue3'
    import ListingAddress from '@/Components/ListingAddress.vue'
    import Price from '@/Components/UI/Price.vue'
    import Box from '@/Components/UI/Box.vue'
    import ListingSpace from '@/Components/UI/ListingSpace.vue'
    import { ref } from 'vue'
    import {useMonthlyPayment} from '@/Composables/useMonthlyPayment'
    import MakeOffer from './Show/Components/MakeOffer.vue'
    import { debounce } from 'lodash'
    import OfferMade from './Show/Components/OfferMade.vue'
import EmptyState from '@/Components/UI/EmptyState.vue'


     const offer = ref(props.listing.price)
     const interestRate = ref(2.5)
     const duration = ref(25)

     const props = defineProps({ 
        listing: Object,
        offerMade: Object,
               })
               
               const { monthlyPayment , totalPaid, totalInterest } = useMonthlyPayment(offer, interestRate, duration,)

    </script>