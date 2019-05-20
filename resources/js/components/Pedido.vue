<template>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h3>Dados do Pedido</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">

                        <label>Adicionar Marmita</label>
                        <div class="input-group">
                            <select id="select-marmitex" class="form-control">
                                <option v-for='ms in marmitexs' :value="ms.id">{{ms.nome}} - {{ms.material}} - R$ {{ms.valor_unitario}},00</option>
                            </select>
                            <button type="button" class="btn btn-success" @click="addMarmitex()"><i class="fa fa-plus"></i></button>
                        </div>
                    </div>
                </div><br><br><br>


                <div class="row" v-for="(m,index) in marmitex">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <div class="form-group">
                                    <h4>Marmita {{index+1}}</h4>
                                    <button type="button" class="btn btn-success" style="float: right" @click='duplicarMarmitex(index)'>Duplicar</button>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="col-md-12">
                                    <label>Cardapio</label>
                                    <select class=" form-control select-2 select-cardapio" name="cardapio[]"  :id="'select-cardapio'+index" v-model="m.cardapios" multiple>
                                        <option v-for='c in cardapios' :value="c" :key="c.id" :selected="c.default == 0 ? 'selected' : ''">
                                            {{c.nome}}
                                        </option>
                                    </select>
                                </div>
                                <span>selecionado: {{m.cardapios}}</span>
                                <div class="col-md-6" v-if="marmitex">
                                    <label>Carne</label>
                                    <select class=" form-control select-2 " name="carnes[]" @change=setCarnes() :id="'select-carnes'+index" multiple>
                                        <option v-for='carne in carnes' :value="carne.id">
                                            {{carne.nome}}
                                        </option>
                                    </select>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:{
            carnes: Array,
            cardapios: Array,
            marmitexs: Array
        },
        data(){
            return {
                marmitex:{}
            }
        },
        methods:{
            addCardapio(id_marmitex){
                let cardapio = $('#select-cardapio'+id_marmitex).select2("val");
                let index_marmitex   = this.marmitex.findIndex(i => i.id == id_marmitex);
                console.log(this.marmitex[index_marmitex])

                this.marmitex[index_marmitex].cardapio = cardapio;
            },
            addMarmitex(){
                let marmitex = $('#select-marmitex').val();
                let carnes   = $('#select-carne'+marmitex).val();

                let add = Array();
                add.id = marmitex;
                add.cardapios = [];
                add.carnes = [];
                console.log(marmitex);
                this.marmitex[marmitex] = add;
                console.log(this.marmitex);
            },
            duplicarMarmitex(index){
                let marmit = this.marmitex[index];
                this.marmitex.push(marmit);
            }
        },
        mounted(){
            console.log(this.marmitexs);
        },
        updated(){
            let vm = this;
            for (var i = this.marmitex.length - 1; i >= 0; i--) {
                $('#select-cardapio'+[i]).select2({
                    theme:'classic'
                });
                $('#select-carnes'+[i]).select2({
                    theme:'classic'
                })
            }
        }
    }
</script>

<style type="text/css">
    .select2-results__option[aria-selected=true] {
        display: none;
    }
</style>
