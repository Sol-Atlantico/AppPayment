<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Compra efetuado pelo comerciante</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.css">
	<link href="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.css" rel="stylesheet">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body>

	<div>
		<label class="mdc-text-field mdc-text-field--outlined">
		<span class="mdc-notched-outline">
		<span class="mdc-notched-outline__leading"></span>
		<span class="mdc-notched-outline__notch">
		<span class="mdc-floating-label" id="my-label-id">Your Name</span>
		</span>
		<span class="mdc-notched-outline__trailing"></span>
		</span>
		<input type="text" class="mdc-text-field__input" aria-labelledby="my-label-id">
		</label>
	</div>
	
	<div class="container">
		<h3 class="my-4">Teste de Compra | em PHP</h3>
		<div class="alert alert-info">
			<p>O <b>merchantRef, merchantSession, timestamp, entityCode e referenceNumber</b> podem ser (e é melhor que fossem) gerados/processados no backend.</p>
			<p>O <b>transactionCode, posID, posAutCode, currency, is3DSec, urlMerchantResponse, FingerPrintVersion</b> devem estar estáticos no backend.</p>
			<p>O <b>FingerPrint</b> deve ser gerado somente no backend.</p>
			<p> O <b>posAutCode</b> não deve ser visivel no frontend nem enviado na requisição de pagamento.</p>
		</div>
		<form method="post" id="form1" action="postback.php">
			<div class="row">
				<div class="col-6">
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
				</div>
				<div class="col-6">
					<div class="form-group">
						<label for="amount">amount</label>
						<input type="number" class="form-control" id="amount" value="1000" name="amount">
					</div>
				</div>
				<div class="col-6">
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
				</div>
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
		<hr>
		<span class="text-muted">Sociedade Interbancária e Sistemas de Pagamento</span>
		<br><br>
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