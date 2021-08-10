<template>
    <div class="offset-md-1 col-md-10 mt-5">
                <div class="card">
                    <div class="card-header text-center text-monospace" style="color: #134684;font-size: 20px">
                        CRUD PERSONA BOXMAGIC
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Ingrese los datos de la persona</h5>
                        <form v-on:submit.prevent="NewPersona()">
                            <fieldset class="form-group">
                                <label for="rut">Rut </label>
                                <input type="text" class="form-control" id="rut" placeholder="Rut" onchange="validaRut(this)" v-model="rut">
                            </fieldset>
                            <fieldset class="form-group">
                                <label for="formGroupExampleInput2">Nombre</label>
                                <input type="text" class="form-control" id="nombre" placeholder="Nombre" v-model="nombre">
                            </fieldset>
                            <fieldset class="form-group">
                                <label for="formGroupExampleInput2">Apellido Paterno:</label>
                                <input type="text" class="form-control" id="apellidoP" placeholder="Apellido Paterno" v-model="apellidoP">
                            </fieldset>
                            <fieldset class="form-group">
                                <label for="formGroupExampleInput2">Apellido Materno</label>
                                <input type="text" class="form-control" id="apellidoM" placeholder="Apellido Materno" v-model="apellidoM">
                            </fieldset>
                            <fieldset class="form-group">
                                <input type="submit" class="form-control"  value="Enviar">
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>

</template>

<script>
    export default {
        data(){
            return {
                rut: '',
                nombre:'',
                apellidoP: '',
                apellidoM: '',
                persona: [],
            }

        },
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            NewPersona() {
                const parametros = {
                    rut: this.rut,
                    nombre: this.nombre,
                    apellidoP: this.apellidoP,
                    apellidoM: this.apellidoM
                }
                axios.post('/Persona',parametros).then((response)=>{
                    const persona = response.data;
                    this.$emit('add',persona);
                this.rut= '';
                this.nombre= '';
                this.apellidoP= '';
                this.apellidoM = ''
                });
                
                
                
            }
        }
    }


    
</script>
