<template>

    <div class="card">
        <div class="card-header">
            <h3>Dados do Pedido</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">

                    <label>Adicionar Marmita</label>
                    <form v-on:submit.prevent="addMarmitex()">
                        <div class="input-group">
                            <select id="select-marmitex" v-model="marmita" class="form-control">
                                <option v-for='ms in marmitexs' :key="ms.id" :value="ms">{{ms.nome}} - {{ms.material}} - R$ {{ms.valor_unitario}},00</option>
                            </select>
                            <button type="submit" class="btn btn-success" ><i class="fa fa-plus"></i></button>
                        </div>
                    </form>
                </div>
            </div><br><br><br>

        </div>
    </div>
</template>

<script>
    export default {
        props:{
            carn: Array,
            cardap: Array,
            marmitexs: Array
        },
        data(){
            return {
                marmita:''
            }
        },
        methods:{
            addMarmitex(){
                this.$emit('new',this.marmita);
            }
        },
        mounted(){
        }
    }
</script>

<style type="text/css">
    .select2-results__option[aria-selected=true] {
        display: none;
    }
</style>
