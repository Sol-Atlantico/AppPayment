<?php

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

include("lib.php");

// CONFIGURAÇÕES

$posID = "90000265";
$posAutCode = "cGq8IlXTlPRC3FQA";

// OBTER DADOS DE PAGAMENTO

$amount = isset($_POST["amount"]) ? $_POST["amount"] : "";
$merchantRef = isset($_POST["merchantRef"]) ? $_POST["merchantRef"] : "R" . date('YmdHms');
$merchantSession = isset($_POST["merchantSession"]) ? $_POST["merchantSession"] : "S" . date('YmdHms');
$dateTime = isset($_POST["timestamp"]) ? $_POST["timestamp"] : date('Y-m-d H:m:s');

// TIPO DE OPERACAO
// 1 - COMPRA
// 2 - PAGAMENTO DE SERVICO
// 3 - RECARGA
$transactionCode = "3";

$entityCode = "48";
$referenceNumber = isset($_POST["referenceNumber"]) ? $_POST["referenceNumber"] : "";

// PREPARAR DADOS PARA EFETUAR REQUISIÇÃO/REQUEST
$responseUrl = 'http://localhost/php/callback.php';

$fields = [
	'transactionCode' => $transactionCode,
	'posID' => $posID,
	'merchantRef' => $merchantRef,
	'merchantSession' => $merchantSession,
	'amount' => $amount,
	'currency' => '132',
	'is3DSec' => '1',
	'urlMerchantResponse' => $responseUrl,
	'languageMessages' => 'pt',
	'timeStamp' => $dateTime,
	'fingerprintversion' => '1',
	'entityCode' => $entityCode,
	'referenceNumber' => $referenceNumber,
];

// GERAR PRINGER PRINT

$fields['fingerprint'] = GerarFingerPrintEnvio(
	$posAutCode, $fields['timeStamp'], $amount,
	$fields['merchantRef'], $fields['merchantSession'], $fields['posID'],
	 $fields['currency'], $fields['transactionCode'], $fields['entityCode'], $fields['referenceNumber']
);

// FAZER REQUISIÇÃO

$postUrl = "https://www.vinti4net.cv/bizmpi/CardPayment?FingerPrint=" . urlencode($fields["fingerprint"]) . "&TimeStamp=" . urlencode($fields["timeStamp"]) . "&FingerPrintVersion=" . urlencode($fields["fingerprintversion"]);

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
				//setTimeout(function(){
					document.forms[0].submit();
				//}, 1000);
			}

		</script>
	</body>
</html>