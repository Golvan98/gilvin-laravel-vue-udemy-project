<template>

<form @submit.prevent="login">

    <div class="w-1/2 mx-auto">

        <div>
            <label for="email" class="label"> E-mail (username)</label>
            <input id="email" v-model="form.email" type="text" class="input"/>
            <div class="input-error"> Potential errors </div>
        </div>
        
        <div class="mt-4">
            <label for="password" class="label"> Password </label>
            <input id="password" v-model="form.password" type="password" class="input"/>
            <div class="input-error"> Potential errors </div>
        </div>


        <div>
            <button class="btn-primary w-full" type="submit"> Submit </button>
        </div>

    </div>


</form>

</template>

<script setup>
import { useForm } from '@inertiajs/inertia-vue3';

const form = useForm({
    email:null,
    password: null
})

const login = () => form.post(route('login.store'))

</script>