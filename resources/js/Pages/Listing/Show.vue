<template>
    <div class="flex flex-col-reverse md:grid grid-cols-12 gap-4">  

      
        <Box class="md:col-span-7 flex items-center w-full"> 
           <div class="w-full text-center font-medium text-gray-500"> No images </div> 
        </Box>

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
                Offer 
            </template> 
            make an offer
        </Box>

      </div>

    </div>                     
</template>
    
    <script setup>
     import ListingAddress from '@/Components/ListingAddress.vue'
     import Price from '@/Components/UI/Price.vue'
     import Box from '@/Components/UI/Box.vue'
     import ListingSpace from '@/Components/UI/ListingSpace.vue'
    defineProps({ 
        listing: Object,
               })
    
    
    </script>