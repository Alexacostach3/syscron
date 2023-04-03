<script setup>
import { ref, onMounted, onUpdated, onUnmounted } from 'vue';

const props = defineProps(
    {
        titulo : {
            type : String,
            required : true,
        },
        contenido : {
            type : String,
            required : false,
            default : "Cuerpo"
        }
    }
)
const emit = defineEmits(['mi-evento']);


let mensaje = ref("");


console.log("Componente creado!");

onMounted(() => {
  console.log("Montado");
})

onUpdated(()=>{
    console.log("Actualizado");
})

onUnmounted(()=>{
    console.log("Destruido");
})

</script>
<template>
    <div class="card m-0" >
       <h1>Hijo</h1>
        <div class="card-body">
            <h5 class="card-title">{{ titulo }}</h5>
            <p class="card-text">{{ contenido }}</p>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">@</span>
                <input type="text" class="form-control" placeholder="Mensaje" aria-label="Username" aria-describedby="basic-addon1"
                    v-model="mensaje">
            </div>
            <button class="btn btn-primary" 
                @click="$emit('mi-evento',mensaje)">
                LLamo evento
            </button>
        </div>
    </div>
   
</template>



