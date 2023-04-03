<script setup>
import { ref } from 'vue';



const profesor =  ref({
    nombre : '',
    cedula : '',
    contacto : {
        email : '',
        cel : ''
    },
    materias : [],
    doc : false
})

let edito = ref(false);
let listaProfesor = ref([]);
let nuevaMateria = ref('');
let listaMateria = ref([]);

const agregar = () => {
    // profesor.value.materias.push(nuevamateria.value);
    listaMateria.value.push(nuevaMateria.value);
    setTimeout( () =>{
        nuevaMateria.value = [];
    },2000);
}
const guardar = () => {
    profesor.value.materias = listaMateria;
    listaProfesor.value.push(
        {
            nombre : profesor.value.nombre,
            cedula : profesor.value.cedula,
            contacto : {
                email : profesor.value.contacto.email,
                cel : profesor.value.contacto.cel
            },
            materias: profesor.value.materias,
            doc : profesor.value.doc
        }
    );
    profesor.value.nombre = '';
    profesor.value.cedula = '';
    profesor.value.contacto.email = '';
    profesor.value.contacto.cel = '';
    profesor.value.materias = [];
    profesor.value.doc = false;
    listaMateria = ref([]);
}
const editar = (ind) => {
    edito = true;
    listaMateria = ref([]);
    let pos = listaProfesor.value.findIndex(profe => profe.cedula === ind);
    let profe = listaProfesor.value[pos];
    profesor.value.nombre = profe.nombre;
    profesor.value.cedula = profe.cedula;
    profesor.value.contacto.email = profe.contacto.email;
    profesor.value.contacto.cel = profe.contacto.cel;
    profesor.value.materias = profe.materias;
    profe.materias.forEach(e => {
        listaMateria.value.push(e);
    });
    profesor.value.doc = profe.doc;
}
const guardarcambios = () => {
    profesor.value.materias = listaMateria.value;
    let pos = listaProfesor.value.findIndex(profe => profe.cedula === profesor.value.cedula);
    listaProfesor.value.splice(pos,1,
        {
            nombre : profesor.value.nombre,
            cedula : profesor.value.cedula,
            contacto : {
                email : profesor.value.contacto.email,
                cel : profesor.value.contacto.cel
            },
            materias:profesor.value.materias,
            doc : profesor.value.doc
        }
    );
    profesor.value.nombre = '';
    profesor.value.cedula = '';
    profesor.value.contacto.email = '';
    profesor.value.contacto.cel = '';
    profesor.value.materias = [];
    profesor.value.doc = false;
    edito = false;
    listaMateria.value = [];
}
const regresa = () => {
    
    profesor.value.nombre = '';
    profesor.value.cedula = '';
    profesor.value.contacto.email = '';
    profesor.value.contacto.cel = '';
    profesor.value.materias = [];
    profesor.value.doc = false;
    edito = false;
    listaMateria.value = [];
}
const eliminar = (ind) => {
    let pos = listaProfesor.value.findIndex(profe => profe.cedula === ind);
    listaProfesor.value.splice(pos,1);
}
</script>
<!-- ----------------------------------------------------------- -->
<template>
    <h1>Nosotros</h1>
    <br>
    <section>
        <h1>Añadir Profesor</h1>
        <hr>
        <div class="container-fluid">
            
            <div class="form-floating mb-3" >
                <input  class="form-control pt-3 pb-0" style="height: calc(2.5rem + 2px);" id="usuario"  type="text" placeholder="Nombres"
                        v-model="profesor.nombre">
                <label class="pt-2 pb-0" for="usuario">Nombre</label>
            </div>
            <div class="form-floating mb-3"  >
                <input class="form-control pt-3 pb-0" style="height: calc(2.5rem + 2px);" id="cedula" type="text" placeholder="cedula"
                        v-model="profesor.cedula">
                <label class="pt-2 pb-0" for="cedula">Cedula</label>
            </div>
            <div class="form-floating mb-3">
                <input class="form-control pt-3 pb-0" style="height: calc(2.5rem + 2px);" id="email" type="text" placeholder="Email"
                        v-model="profesor.contacto.email">
                <label class="pt-2 pb-0" for="email">Email</label>
            </div>
            <div class="form-floating mb-3">
                <input class="form-control pt-3 pb-0" style="height: calc(2.5rem + 2px);" id="cel" type="text" placeholder="Cel"
                        v-model="profesor.contacto.cel">
                <label class="pt-2 pb-0" for="cel">Celular</label>
            </div>
            <div class="form-floating mb-3 ">
                <input class="form-control" id="materia" type="text" placeholder="Materia"
                        v-model="nuevaMateria">
                <label for="materia">Materias</label>
            </div>
            <div class="row m-0">
                <button type="button" class="btn btn-success col-md-2"
                        @click=agregar>Agregar
                </button>
                <ul class="list-group list-group-horizontal col-md-10 px-2">
                    <li class="list-group-item"
                         v-for="(elem,index) in listaMateria" :key="index"> 
                            {{ elem }}
                    </li>
                </ul>
            </div>
            <h5>{{ nuevaMateria }}</h5>
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" value="" id="documentacion"
                        v-model="profesor.doc">
                <label class="form-check-label" for="documentacion">
                   Documentacion entregada
                </label>
            </div>
            
            <button type="button" class="btn btn-success"
                    v-show="!edito" @click=guardar>Guardar</button>
            <button type="button" class="btn btn-success"
                    v-show="edito" @click=guardarcambios>Guardar Cambios</button>
            <button type="button" class="btn btn-default"
                    v-show="edito" @click=regresa>Salir</button>

        </div>
    </section>
    
    <section>
        <h1>Listado profesores</h1>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col" >Nombre</th>
                    <th scope="col">Cedula</th>
                    <th scope="col">Contacto</th>
                    <th scope="col">Materias</th>
                    <th scope="col">Documentacion</th>
                    <th scope="col">opciones</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(elem, index) in listaProfesor" :key="elem.cedula">
                    <th scope="row">{{ index }}</th>
                    <td>{{elem.nombre}}</td>
                    <td>{{elem.cedula}}</td>
                    <td>email: {{elem.contacto.email }} <br> celular: {{ elem.contacto.cel }}</td>
                    <td>
                        <li v-for="(mat,index) in elem.materias" :key="elem.cedula">
                            {{ mat }}
                        </li>
                    </td>
                    <td v-if="elem.doc">Activo</td>
                    <td v-else="elem.doc">Desactivado</td>
                    <td>
                        <button type="button" class="btn btn-warning"
                        @click=eliminar(elem.cedula)>Eliminar</button>
                        <button type="button" class="btn btn-warning"
                        @click=editar(elem.cedula)>Editar</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </section>

        
  
</template>
<!-- ----------------------------------------------------------- -->
<style>
.negative {
    color: red;
}

.positive {
    color: green;
}

.zero {
    color: black;
}
</style>