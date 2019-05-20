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
                marmita:[]
            }
        },
        methods:{
            addMarmitex(){
            }
        },
        mounted(){
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
