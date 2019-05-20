<template>
	<div class="row">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">
					<div class="form-group">
						<h4>Marmita </h4>
						<button type="button" class="btn btn-success" style="float: right" >Duplicar</button>
					</div>
				</div>

				<div class="card-body">
					<div class="col-md-12">
						<label>Cardapio</label>
						<select class=" form-control select-2 select-cardapio" name="cardapio[]"  id="'select-cardapio'"  multiple>
							<option selected="c.default == 0 ? 'selected' : ''">
								
							</option>
						</select>
					</div>
					<span>selecionado:</span>
					<div class="col-md-6" v-if="marmitex">
						<label>Carne</label>
						<select class=" form-control select-2 " name="carnes[]" multiple>
							<option >
								carne.nome
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

	}
</script>