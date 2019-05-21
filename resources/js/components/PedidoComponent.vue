<template>
	<div class="col-md-12">
		<div class="row">

			<pedido-cliente :clientes='clientes' :bairros='bairros'></pedido-cliente>

			<div class="col-md-6">
				<pedido :clientes='clientes' :carnes='carnes' :cardapios='cardapios' :marmitexs='marmitexs' @setcliente="setCliente"  @new="addMarmita"></pedido>

				<marmita v-for="marmita,index in marmitasOrdenadas" :marmita='marmita' :cardapios='cardapios' :chave="index" :carnes='carnes' :key='index' ></marmita>
			</div>

		</div>
		<button class="btn  btn-success" @click="salvarPedido()">Salvar</button>

	</div>

</template>
<script type="text/javascript">
	export default{
		props:['clientes','carnes','cardapios','marmitexs','bairros'],
		data(){
			return {
				marmitas:[],
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
		methods:{
			addMarmita(marmita){
				this.marmitas.push(marmita);
			},
			setCliente(cliente){
				this.cliente = cliente;
				console.log(this.cliente);
			},
			salvarPedido(){
				let marmitas = this.marmitas;
				let cliente  = this.cliente;
				axios({
					  method: 'post', // verbo http
					  url: '/pedidos', // url
					  data: {marmitas,cliente}
					})
				.then(response => {
					console.log(response)
				})
				.catch(error => {
					console.log(error)
				})
				
			}
		},
		watch:{
			marmitas: function(val){
				this.$store.commit('addMarmita',val);
			}
		},
		computed: {
			marmitasOrdenadas: function () {
				return _.orderBy(this.marmitas, 'id')
			}
		},
		mounted(){
		},
		updated(){
			let vm = this;
			for (var i = this.marmitas.length - 1; i >= 0; i--) {
				$('.select-cardapio'+[i]).select2({
					theme:'classic'
				});
				$('.select-carnes'+[i]).select2({
					theme:'classic'
				})
			}
		}
	}
</script>

