<template>
    <div class="offset-md-1 col-md-10 mt-5">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Rut</th>
                            <th>Nombre</th>
                            <th>Apellido P.</th>
                            <th>Apellido M.</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(Aperso, index) in Aperso" :key="Aperso.id">
                            <td>
                            
                            <p >{{Aperso.rut}}</p>
                                
                            </td>
                            <td>
                            <input v-if="ModoEditar" type="text" v-model="Aperso.nombre" class="form-control"></input>
                            <p v-else>{{Aperso.nombre}}</p>

                            </td>
                            
                            <td>
                            <input v-if="ModoEditar" type="text" v-model="Aperso.apellido_paterno" class="form-control"></input>
                            <p v-else>{{Aperso.apellido_paterno}}</p>

                            </td>
                            
                            <td>
                            <input v-if="ModoEditar" type="text" v-model="Aperso.apellido_materno" class="form-control"></input> 
                            <p v-else>{{Aperso.apellido_materno}}</p>

                            </td>
                            <td><button v-on:click="killPersona(index, Aperso.id)" class="btn btn-outline-secondary">Eliminar</button></td>
                            <td>
                            <button v-if="ModoEditar" v-on:click="guardarPersona(index,Aperso.id,Aperso.rut,Aperso.nombre,Aperso.apellido_paterno,Aperso.apellido_materno)" class="btn btn-outline-primary">Guardar</button>
                            <button v-else v-on:click="updatePersona()" class="btn btn-outline-secondary">Editar</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                
               
    </div>

</template>

<script>
    export default {
        props:['Aperso'],
        data(){
            return{
                    ModoEditar: false,
                    rut : this.Aperso.rut,
                    nombre: '',
                    apellidoP: '',
                    apellidoM: ''

                };
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods:{
            killPersona(index,id){
                
                    axios.delete('/Persona/'+id).then((response)=>{
                    
                    this.$emit('delete', index)
                });
                    
                    
               
                
            },
            updatePersona(){

                this.ModoEditar =  true;
            },
            guardarPersona(index, id, rut1,nombre1,apellidoP1,apellidoM1){
                
                const data = {
                    rut:rut1,
                    nombre:nombre1,
                    apellidoP:apellidoP1,
                    apellidoM: apellidoM1
                }
                 axios.put('/Persona/'+id, data).then((response)=>{
                    
                    this.ModoEditar =  false;
                    this.$emit('update', index, this.Aperso)
                });
                 
                 
            }
        }
        
    }
</script>
