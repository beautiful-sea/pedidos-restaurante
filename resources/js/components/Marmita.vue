<template>
	<div class="row">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">
					<div class="form-group">
						<h4>Marmita {{chave+1}}</h4>
						<button type="button" class="btn btn-success" style="float: right" @click="addMarmitex()" >Confirmar</button>
					</div>
				</div>

				<div class="card-body">
					<div class="col-md-12">
						<label>Cardapio</label>
						<v-select v-model="selectedCardapio"  multiple>
							<option v-repeat="cardapio in c" :value="c.id"></option>
						</v-select>
					</div>
					<div class="col-md-6" v-if="">
						<label>Carne</label>
						<select class=" form-control select-2 select-carnes" name="carnes[]" multiple>
							<option v-for="carne in carnes" >
								{{carne.nome}}
							</option>
						</select>
					</div> 
				</div>
			</div>
		</div>
	</div>
</template>

<script type="text/javascript">
	export default{
		props:['marmita','cardapios','carnes','chave'],
		data(){
			return {
				cardapio: this.cardapios,
				selectedCardapio:[],
				selectedMarmita: this.marmita
			}
		},
		watch:{
			selectedMarmita: {
				handler(val, oldVal){
				},
				deep: true
			},
			selectedCardapio: {
				handler(val, oldVal){
					console.log(val);
				},
				deep: true
			}
		},
		methods:{
			addMarmitex(){
				this.$emit('new',this.selectedMarmita);
			},
			addCardapio(){
				var data = $('.select-cardapio').select2("data");
				// console.log(this.selectedCardapio);
				this.selectedMarmita["cardapio"] = this.selectedCardapio;
			}
		},
		mounted(){
			var vm = this;
			$('.select-cardapio').select2({
				theme:'classic'
			}).trigger('change')
			.on('select2:select select2:unselect', function (e) {
				// vm.addCardapio();
			})

			$('.select-carnes').select2({
				theme:'classic'
			});
		},
		created(){
			for (var i = this.cardapios.length - 1; i >= 0; i--) {
				if(this.cardapio[i].selected == 1){
					this.selectedCardapio.push(this.cardapio[i]);
				}
			}
		}
	}
</script>