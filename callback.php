<?php

	include("lib.php");

// resposta_pagamento.php

// OBTER DADOS
$posAutCode = "7O6WoWTSh8kGMIes";

// CONSTANTES DE RESPOSTA DE SUCESSOS
$successMessageType = array('8', '10', 'P', 'M');

// TRANSAÇÃO COM RESPOSTA DE SUCESSO
if(isset($_POST["messageType"]) && in_array($_POST["messageType"], $successMessageType))
{
	// CALCULAR FINGERPRINT
	$fingerPrintCalculado = GerarFingerPrintRespostaBemSucedida(
	    $posAutCode , $_POST["messageType"] , $_POST["merchantRespCP"] ,
        $_POST["merchantRespTid"] , $_POST["merchantRespMerchantRef"] , $_POST["merchantRespMerchantSession"] ,
        $_POST["merchantRespPurchaseAmount"] , $_POST["merchantRespMessageID"] , $_POST["merchantRespPan"] ,
        $_POST["merchantResp"] , $_POST["merchantRespTimeStamp"] , $_POST["merchantRespReferenceNumber"] ,
        $_POST["merchantRespEntityCode"] , $_POST["merchantRespClientReceipt"] , trim($_POST["merchantRespAdditionalErrorMessage"]) ,
        $_POST["merchantRespReloadCode"]
	);

	// echo "Recebido: " . $_POST["resultFingerPrint"] . "<br>";
	// echo "Calculad: " . $fingerPrintCalculado . "<br>";
	// die();

	/*ATENÇÃO: VALIDAR FRINGERPRINT DE SUCESSO
	PARA OBTER UMA MELHOR GARANTIA DE SEGURANÇA*/
	if($_POST["resultFingerPrint"] == $fingerPrintCalculado)
	{
		// TRANSACAO BEM SUCEDIDA
		echo "<h1>Sucesso</h1>";

	}
	else
	{
		// FINGER PRINT RECEBIDO E CALCULADO SAO DIFERENTES

		echo "<h1>Erro</h1>";
		echo "<p>Finger Print de Resposta Inválida</p>";
	}
}
else if(isset($_POST["UserCancelled"]) && $_POST["UserCancelled"] == "true")
{
	echo "<h1>Utilizador cancelou a requisição de compra</h1>";
}
else
{
	echo "<h1>Erro</h1>";

	echo "<br>";
	echo "<p>" . $_POST["merchantRespErrorDescription"] . "</p>";
	echo "<br>";
	echo "<p>" . $_POST["merchantRespErrorDetail"] . "</p>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Compra efetuado pelo comerciante</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body>
	
	<div class="container">
		<h3 class="my-4">Resposta da Transacção | em PHP</h3>

			<table class="table">
				<tr>
					<th>Key</th>
					<th>Value</th>
				</tr>
				<?php
					
					foreach($_POST as $key => $value)
					{
						echo "<tr><td>" . $key . "</td><td>" . $value . "</td></tr>";
					}

					foreach($_GET as $key => $value)
					{
						echo "<tr><td>" . $key . "</td><td>" . $value . "</td></tr>";
					}

				?>				
			</table>

	</div>

</body>
</html>