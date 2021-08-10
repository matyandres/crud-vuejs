<template>
<div>
    <form-component @add="addPersona"></form-component>  

    <table-component :Aperso="NewPersona" @update="updatePersona()" @delete="deletePersona()"></table-component>
</div>
</template>

<script>

    export default {
        data(){
            return{
                NewPersona: []
                }
        },
        mounted() {
            axios.get('/Persona').then((response)=>{
                    this.NewPersona = response.data;
                    console.log(this.NewPersona)
                });
            
        },
        methods:{
            addPersona(addd) {
                this.NewPersona.push(addd);
                console.log(this.NewPersona)
            },
            deletePersona(index){
                this.NewPersona.splice(index ,1);
            },
            updatePersona(index,uPersona){
            console.log(uPersona)
                this.NewPersona[index] = uPersona;
            }
        }
    }
</script>
