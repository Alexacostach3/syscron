<script setup>
import ComponenteHijo from '@/Components/Repaso/ComponenteHijo.vue';
import { Head } from '@inertiajs/vue3';

let info = [{titulo:"Post 1", contenido :"Texto1"},
            {titulo:"Post 2"},
            {titulo:"Pots 3", contenido :"Texto 3"}]


const alertas = (mensaje)=>{
    alert(mensaje);
}
</script>
<template>
    <Head title="Ciclo Vida" />
    <div class="container-fluid mt-1 text-center">
        <div class="row">
            <div class="col-md-4"
                v-for="elem in info" :key="elem.titulo">
                <ComponenteHijo 
                    :titulo="elem.titulo" :contenido="elem.contenido"
                    @mi-evento="alertas">
                </ComponenteHijo>
            </div>  
        </div>
    </div>
</template>



<style lang="scss" scoped>
    
</style>