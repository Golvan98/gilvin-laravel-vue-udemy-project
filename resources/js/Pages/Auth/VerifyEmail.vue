<template>
    <div> You need to be verified to see this page</div>

    <div>
        <Link :href="route('verification.send')" method="post" as="button" class="text-indigo-600 dark:test-indigo-400"> Resend Verification Link </Link>
    </div>

</template>

<script setup>
    import { Link } from '@inertiajs/inertia-vue3';
</script>