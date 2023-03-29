<template>

    <form @submit.prevent="register">
    
        <div class="w-1/2 mx-auto">
    
            <div class="mt-4">
                <label for="email" class="label"> E-mail </label>
                <input id="email" v-model="form.email" type="text" class="input"/>
                <div v-if="errors.email" class="input-error">{{ errors.email }}</div>
            </div>

            <div class="mt-4">
                <label for="name" class="label"> Name </label>
                <input id="name" v-model="form.name" type="text" class="input"/>
                <div v-if="errors.name" class="input-error">{{ errors.name }}</div>
            </div>
            
            <div class="mt-4">
                <label for="password" class="label"> Password </label>
                <input id="password" v-model="form.password" type="password" class="input"/>
                <div v-if="errors.password" class="input-error">{{ errors.password }}</div>
            </div>

            <div class="mt-4">
                <label for="password_confirmation" class="label"> Confirm Password </label>
                <input id="password_confirmation" v-model="form.password_confirmation" type="password" class="input"/>
                <div v-if="errors.password" class="input-error">{{ errors.password }}</div>
            </div>
    
    
            <div>
                <button class="primary-btn w-full mt-4" type="submit"> Create Account  </button>
            </div>
    
        </div>
    
    
    </form>
    
    </template>
    
    <script setup>
    import { useForm } from '@inertiajs/inertia-vue3';
    
    const props = defineProps({ errors:Object})
    
    const form = useForm({
        name: null,
        email:null,
        password: null,
        password_confirmation: null
    })
    
    const register = () => form.post(route('login.store'))
    
    </script>