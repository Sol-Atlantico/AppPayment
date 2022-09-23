<?php

include("lib.php");

// CONFIGURAÇÕES

$posID = "90051";
$posAutCode = "123456789A";

// OBTER DADOS DE PAGAMENTO
$amount = "1000";
$merchantRef = "R" . date('YmdHms');
$merchantSession = "S" . date('YmdHms');
$dateTime = date('Y-m-d H:m:s');

// TIPO DE OPERACAO
// 1 - COMPRA
// 2 - PAGAMENTO DE SERVICO
// 3 - RECARGA
$transactionCode = "1";

$entityCode = "";
$referenceNumber = "";

// URL PARA RECEBER A RESPOSTA DO PAGAMENTO
// MUDAR PARA URL DO SEU SITE
$responseUrl = "http://www.meusite.com/resposta_pagamento.php";
				//  OU "http://localhost/callback.php"

// DADOS A ENVIAR
$fields = [
	'transactionCode' => $transactionCode,
	'posID' => '90051',
	'merchantRef' => $merchantRef,
	'merchantSession' => $merchantSession,
	'amount' => $amount,
	'currency' => '132',
	'is3DSec' => '1',
	'urlMerchantResponse' => $responseUrl,
	'languageMessages' => 'pt',
	'timeStamp' => $dateTime,
	'fingerprintversion' => '1',
	'entityCode' => '',
	'referenceNumber' => ''
];

// GERAR PRINGER PRINT E ADICIONAR AOS DADOS DE ENVIO
$fields['fingerprint'] = GerarFingerPrintEnvio(
	$posAutCode, $fields['timeStamp'], $amount,
	$fields['merchantRef'], $fields['merchantSession'], $fields['posID'],
	 $fields['currency'], $fields['transactionCode'], $entityCode, $referenceNumber
);

// URL PARA FAZER REQUISIÇÃO
$postUrl = "https://mc.vinti4net.cv/BizMPIOnUs/CardPayment?FingerPrint=" . urlencode($fields["fingerprint"]) . "&TimeStamp=" . urlencode($fields["timeStamp"]) . "&FingerPrintVersion=" . urlencode($fields["fingerprintversion"]);

?>

<html>
	<head>
		<title>Pagamento vinti4</title>
	</head>
	<body onload='autoPost()'>
		<div>
			<h5>Processando o pagamento...</h5>
			<form action='<?= $postUrl ?>' method='post'>
				<?php

					foreach ($fields as $key => $value) {
						echo "<input type='hidden' name='" . $key . "' value='" . $value . "'>";
					}

				?>
			</form>
		</div>		
		<script>
			
			function autoPost()
			{
				document.forms[0].submit();
			}

		</script>
	</body>
</html>