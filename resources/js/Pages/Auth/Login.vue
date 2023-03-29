<template>

<form @submit.prevent="login">

    <div class="w-1/2 mx-auto">

        <div>
            <label for="email" class="label"> E-mail (username)</label>
            <input id="email" v-model="form.email" type="text" class="input"/>
            <div v-if="errors.email" class="input-error">{{ errors.email }}</div>
        </div>
        
        <div class="mt-4">
            <label for="password" class="label"> Password </label>
            <input id="password" v-model="form.password" type="password" class="input"/>
            <div v-if="errors.password" class="input-error">{{ errors.password }}</div>
        </div>

        <div>
            <button class="btn-primary w-full" type="submit"> Login </button>
        </div>

        <div class="mt-2 text-center">
            <Link :href="route('user-account.create')" class="text-sm text-gray-400"> 
                Need an account? click here 
            </Link>
            
        </div>


    </div>


</form>

</template>

<script setup>
import { useForm } from '@inertiajs/inertia-vue3';
import { Link } from '@inertiajs/vue3'
const props = defineProps({ errors:Object})

const form = useForm({
    email:null,
    password: null
})

const login = () => form.post(route('login.store'))

</script>