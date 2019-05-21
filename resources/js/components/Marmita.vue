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
						<select class=" form-control select-2 select-cardapio" v-model="selectedCardapio" multiple>
							<option v-for="c in cardapio" :value="c" >
								{{c.nome}}
							</option>
						</select>
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
				selectedCardapio:[]
			}
		},
		methods:{
			addMarmitex(){
				this.$emit('new',this.marmita);
			}
		},
		mounted(){
			$('.select-cardapio').select2({
				theme:'classic'
			});
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