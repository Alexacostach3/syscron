<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>

    <div class="row m-0 d-flex min-vh-100 flex-column justify-content-center align-items-center">
        <div class="col-md-5">
            <div class="card p-2 shadow" >
                <Link href="/" class="p-3 d-flex flex-column justify-content-center align-items-center">
                    <ApplicationLogo class="text-gray-500 "  style="width: 100px; height: 100px;"  />
                </Link>  
                <div class="card-body pt-0">

                    <slot />

                </div>
            </div>
        </div>
    </div>

  </template>
