<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<link rel="stylesheet" href="./assets/css/bootstrap.css">
		<style type="text/css">
			.bg-base{
				background-color: #013b46;
			}
			.font-color-base{
				corlor: blue;
			}
			.font-color-with-bg{
				color: white;
			}
			.radius-0{
				border-radius: 0 0 0 0;
			}
			.main-icon-size{
				font-size: 85px;
			}
			.info-incon-size{
				font-size: 15px;
			}
			.loading{
				height: 100vh;
				width: 100%;
				position: absolute;
				z-index: 1;
			}
			.hidden{
				display: none !important;
			} 

		</style>
		<script type="text/javascript" src="./assets/js/fa.js"></script>
		<script type="text/javascript" src="./assets/js/vue.js"></script>
		<script type="text/javascript" src="./assets/js/axios.js"></script>
		<script type="text/javascript" src="./assets/js/loading/loading.js"></script>
	</head>
	<body>
	
	<div id="app">
	<img src="./assets/images/loading.gif" alt="" class="loading">
			<header>
				<div class="jumbotron bg-base radius-0">
					<div class="row border-bottom border-info">
						<h1 class="display-2 font-color-with-bg">DevHelper</h1>
						<span class="fas fa-hands-helping font-color-with-bg main-icon-size"></span>
					</div>
	
					<div class="row pt-2">
						<button class="btn btn-info mr-2" 
								type="button"
								v-for="category in categories"
								@click="getUtils(category.id, category.description)"
								:key="category.id">{{category.description}}</button>
						<button type="button" class="btn btn-info btn-sm">+</button>
					</div>

				</div>
			</header>
			<main>
				<div class="container" v-if="hasUtils">
					<div class="col-12">
						<div class="row">
							<a href="#" data-toggle="modal" data-target="#modalExemplo">Adicionar Registro </a>
						</div>
					</div>
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
										<input type="text" class="form-control" placeholder="Não vale delete sem where em.." v-model="newUtilContent">
									</div>
									<div class="form-group">
										<label for="">Descrição</label>
										<input type="text" class="form-control" placeholder="Breve descrição sobre o utilitário." v-mode="newUtilDescription">
									</div>
									<div class="form-group">
										<label for="exampleFormControlSelect1">Tipo</label>
										<select class="form-control" id="exampleFormControlSelect1" v-model="newUtilType">
											<option 
												v-for="category in categories"
												:key="category.id"
												:value="category.id"s
												v-text="category.description"></option>
										</select>
									</div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
									<button 
										type="button" 
										class="btn btn-info"
										@click="addNewUtil">Registrar</button>
								</div>
							</div>
						</div>
					</div><!-- modal -->
					<div class="text-center">
						<h2 class="color-info">{{utilTitle}} <span class="fas fa-code"></span></h2>
						<div class="col-12">
							<div class="row justify-content-center">
								<p>Registros encontrados: <span class="badge badge-info info-icon-size">{{utils.length}}</span></p>
							</div>
						</div>
					</div>
					<table class="table table-bordered table-hover">
						<thead class="thead bg-base">
							<tr class="font-color-with-bg">
								<th scope="col">Comando</th>
								<th scope="col">Descrição</th>
							</tr>
						</thead>
						<tbody>
							<template v-for="util in utils">
								<tr title="Clique para editar.">
									<td>{{util.content}}</td>
									<td>{{util.description}}</td>
								</tr>
							</template>
						</tbody>
					</table>
				</div><!--container--><!-- if hasUtils -->
			</main>
			<footer>
				
			</footer>
		</div><!--app-->
	</body>
	<script type="text/javascript" src="./assets/js/jquery.js"></script>
	<script type="text/javascript" src="./assets/js/bootstrap.js"></script>
	<script type="text/javascript" src="./assets/js/app.js"></script>
</html>