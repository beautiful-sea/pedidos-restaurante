<template>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h3>Dados do Cliente</h3>
            </div>
            <div class="card-body">

                <div class="row">
                    <div class="col-md-6">
                        <label>Cliente</label>
                        <select v-model="cliente.id" class=" form-control select-2" name="cliente" id="select-cliente">
                            <option value='0'>Selecione uma Opçao</option>
                            <option v-for='cliente in clientes' :value="cliente.id">
                                {{cliente.nome}}
                            </option>
                        </select>
                    </div> 
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Logradouro</label>
                            <input type="text" v-model='cliente.endereco.logradouro' class="form-control" name="logradouro">
                        </div>

                        <div class="form-group">
                            <label>Número</label>
                            <input type="text" v-model='cliente.endereco.numero' class="form-control" name="logradouro">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Bairro</label>
                            <select id="select-bairro" class="form-control select-2" v-model='cliente.endereco.bairro.id' name="bairro">
                                <option v-for="bairro in bairros" :value='bairro.id'>{{bairro.nome}}</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Referência</label>
                            <input type="text" v-model='cliente.endereco.referencia' class="form-control" name="logradouro">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Complemento</label>
                            <input type="text" v-model='cliente.endereco.complemento' class="form-control" name="logradouro">
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:['bairros','clientes'],
        data(){
            return {
                cliente:{
                    id:'',
                    endereco:{
                        logradouro:'',
                        numero:'',
                        bairro:{
                            id:'',
                            nome:''
                        },
                        referencia:'',
                        complemento:''
                    }
                }
            }
        },
        watch:{
            cliente: {
               handler(val, oldVal){
                  this.$emit('setcliente',val);
              },
              deep: true
          }
      },
      methods:{
        setCliente(){

            let cliente_id = $('#select-cliente').val();
            let cliente = this.clientes.find(item=>item.id == cliente_id);
            if(!cliente){
                this.cliente = {endereco:{bairro:{}}};
                return false;
            }
            this.cliente = cliente;
        }
    },
    mounted(){
        let vm = this;
        $('#select-cliente').select2({
            theme:'classic'
        }).trigger('change').on('change', function () {
            vm.setCliente()
        });
    },
    updated(){
            $('#select-bairro').select2({
        theme:'classic'
    });
    }
}
</script>
