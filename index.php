<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Compra efetuado pelo comerciante</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<link href="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.css" rel="stylesheet">
  	<script src="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.js"></script>
	<script src="material.js"></script>
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body>	
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
      <svg
          class="mdc-select__dropdown-icon-graphic"
          viewBox="7 10 10 5" focusable="false">
        <polygon
            class="mdc-select__dropdown-icon-inactive"
            stroke="none"
            fill-rule="evenodd"
            points="7 10 12 15 17 10">
        </polygon>
        <polygon
            class="mdc-select__dropdown-icon-active"
            stroke="none"
            fill-rule="evenodd"
            points="7 15 12 10 17 15">
        </polygon>
      </svg>
    </span>
  </div>

  <!-- Other elements from the select remain. -->
  <div class="mdc-select__menu mdc-menu mdc-menu-surface mdc-menu-surface--fullwidth">...</div>
</div>
		<!--#################################################-->
		<label class="mdc-text-field mdc-text-field--outlined">
		<span class="mdc-notched-outline">
		<span class="mdc-notched-outline__leading"></span>
		<span class="mdc-notched-outline__notch">
		<span class="mdc-floating-label" id="my-label-id">Codigo Recarga</span>
		</span>
		<span class="mdc-notched-outline__trailing"></span>
		</span>
		<input type="text" class="mdc-text-field__input" aria-labelledby="my-label-id">
		</label>

		<button class="mdc-button foo-button">
		<div class="mdc-button__ripple"></div>
		<span class="mdc-button__label">Button</span>
		</button>
		<button class="mdc-button mdc-button--raised">
		<span class="mdc-button__label">Recaregar</span>
		</button>
	</div>
	<div class="container">
		<form method="post" id="form1" action="postback.php">
			<div class="row">
				<!--<div class="col-6">
					<div class="form-group">
						<label for="transactionCode">transactionCode</label>
						<select class="form-control" id="transactionCode" name="transactionCode">
							<option value="1">1 - Compra</option>
							<option value="2">2 - Pagamento de Serviço</option>
							<option value="3">3 - Recarga</option>
						</select>
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label for="posID">posID</label>
						<input type="number" class="form-control" id="posID" value="90051" name="posID">
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label for="posAutCode">posAutCode</label>
						<input type="text" class="form-control" id="posAutCode" value="123456789A" name="posAutCode">
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label for="merchantRef">merchantRef</label>
						<input type="text" class="form-control" id="merchantRef" name="merchantRef">
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label for="merchantSession">merchantSession</label>
						<input type="text" class="form-control" id="merchantSession" name="merchantSession">
					</div>
				</div>-->
				<div class="col-6">
					<div class="form-group">
						<label for="amount">amount</label>
						<input type="number" class="form-control" id="amount" value="1000" name="amount">
					</div>
				</div>
				<!--<div class="col-6">
					<div class="form-group">
						<label for="currency">currency</label>
						<input type="number" class="form-control" id="currency" value="132" name="currency">
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label for="is3DSec">is3DSec</label>
						<input type="number" class="form-control" id="is3DSec" value="1" name="is3DSec">
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label for="urlMerchantResponse">urlMerchantResponse</label>
						<input type="text" class="form-control" id="urlMerchantResponse" value='<?= "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" ?>callback.php' name="urlMerchantResponse">
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label for="languageMessages">languageMessages</label>
						<select class="form-control" id="languageMessages" name="languageMessages">
							<option value="pt">pt</option>
							<option value="en">en</option>
						</select>
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label for="FingerPrintVersion">FingerPrintVersion</label>
						<input type="text" class="form-control" id="FingerPrintVersion" value="1" name="FingerPrintVersion">
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label for="timestamp">timestamp</label>
						<input type="text" class="form-control" id="timestamp" name="timestamp">
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label for="entityCode">entityCode</label>
						<input type="text" class="form-control" id="entityCode" name="entityCode">
					</div>
				</div>-->
				<div class="col-6">
					<div class="form-group">
						<label for="referenceNumber">referenceNumber</label>
						<input type="text" class="form-control" id="referenceNumber" name="referenceNumber">
					</div>
				</div>
			</div>
			<div class="text-right my-4">
				<button class="btn btn-primary">Efetuar pagamento</button>	
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