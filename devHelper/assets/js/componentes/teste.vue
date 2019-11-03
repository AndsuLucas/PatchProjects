Vue.component('newUtilComponent',{
	props:[
		'list'
	],
	template: `
		<div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="false">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Inserção de Utilidade</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
									<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<div class="form-group">
										<label for="exampleFormControlInput1">Conteudo</label>
										<input type="text" class="form-control" placeholder="Não vale delete sem where em.." >
									</div>
									<div class="form-group">
										<label for="exampleFormControlSelect1">Tipo</label>
										<select class="form-control" id="exampleFormControlSelect1">
											<option 
												v-for="category in list"
												:key="category.id"
												:value="category.id"
												v-model="newUtilType"
												v-text="category.description"></option>
										</select>
									</div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
									<button 
										type="button" 
										class="btn btn-info">Registrar</button>
								</div>
							</div>
						</div>
					</div>


	`	
});
