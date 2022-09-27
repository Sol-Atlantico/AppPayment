<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Compra efetuado pelo comerciante</title>
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<link href="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  	<script src="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.js"></script>
	<script src="material.js"></script>

	<style>
		
	</style>
</head>
<body>	
	<div class="container">
		<p>Denilson Semedo Tavares</p>
		<form method="post" id="form1" action="postback.php">
			<div class="row">
				<div>
					<div class="mdc-select mdc-select--outlined">
						<div class="mdc-select__anchor" aria-labelledby="outlined-select-label">
							<span class="mdc-notched-outline">
								<span class="mdc-notched-outline__leading"></span>
								<span class="mdc-notched-outline__notch">
									<span id="outlined-select-label" class="mdc-floating-label">Selecione o tipo de cartao</span>
								</span>
								<span class="mdc-notched-outline__trailing"></span>
							</span>
							<span class="mdc-select__selected-text-container">
								<span id="demo-selected-text" class="mdc-select__selected-text"></span>
							</span>
							<span class="mdc-select__dropdown-icon">
								<svg class="mdc-select__dropdown-icon-graphic" viewBox="7 10 10 5" focusable="false">
										<polygon class="mdc-select__dropdown-icon-inactive"	stroke="none" fill-rule="evenodd" points="7 10 12 15 17 10"></polygon>
										<polygon class="mdc-select__dropdown-icon-active" stroke="none"	fill-rule="evenodd"	points="7 15 12 10 17 15"></polygon>
								</svg>
							</span>
						</div>
						<!-- Other elements from the select remain. -->
						<div class="mdc-select__menu mdc-menu mdc-menu-surface mdc-menu-surface--fullwidth">...</div>
					</div>
					
					<label class="mdc-text-field mdc-text-field--outlined">
					<span class="mdc-notched-outline">
						<span class="mdc-notched-outline__leading"></span>
						<span class="mdc-notched-outline__notch">
							<span class="mdc-floating-label" id="my-label-id">Codigo Recarga</span>
						</span>
						<span class="mdc-notched-outline__trailing"></span>
					</span>
					<input id="referenceNumber" name="referenceNumber" type="text" class="mdc-text-field__input" aria-labelledby="my-label-id">
					</label>
				</div>

				<!--<div class="col-6">
					<div class="form-group">
						<label for="amount">amount</label>
						<input type="number" class="form-control" id="amount" value="1000" name="amount">
					</div>
				</div>-->
			</div>
			<div class="col-6">
				<button class="mdc-button mdc-button--raised">
					<span class="mdc-button__label">Efetuar pagamento</span>
				</button>	
			</div>		
		</form>
	</div>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/js-sha512/0.8.0/sha512.js"></script>
	<script>
		// AUTO PREENCHER ALGUNS CAMPOS
		$(document).ready(function(){
			$("#merchantRef").val("R" + moment().format('YYYYMMDDHHmmss'));
			$("#merchantSession").val("S" + moment().format('YYYYMMDDHHmmss'));
			$("#timestamp").val(moment().format('YYYY-MM-DD HH:mm:ss'));
		});
	</script>
</body>
</html>