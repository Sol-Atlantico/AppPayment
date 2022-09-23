<?php

// V 1.2

function GerarFingerPrintEnvio
	(
	    $posAutCode, $timestamp, $amount,
	    $merchantRef, $merchantSession, $posID,
	    $currency, $transactionCode, $entityCode,
	    $referenceNumber
	)
{
	// REMOVER POSSIVEIS ZEROS A ESQUERDA
	if(!empty($entityCode))
		$entityCode = (int)$entityCode;

	if(!empty($referenceNumber))
		$referenceNumber = (int)$referenceNumber;

	// CONCATENAR OS DADOS PARA O HASH FINAL
	$toHash = base64_encode(hash('sha512', $posAutCode, true)) . $timestamp . ((int)((float)$amount * 1000))
			. $merchantRef . $merchantSession . $posID
			. $currency . $transactionCode . $entityCode . $referenceNumber
		;

	return base64_encode(hash('sha512', $toHash, true));
}

function GerarFingerPrintRespostaBemSucedida
	(
	    $posAutCode, $messageType, $clearingPeriod,
        $transactionID, $merchantReference, $merchantSession,
        $amount, $messageID, $pan,
        $merchantResponse, $timestamp, $reference,
        $entity, $clientReceipt, $additionalErrorMessage,
        $reloadCode
	)
{
	// REMOVER POSSIVEIS ZEROS A ESQUERDA
	if(!empty($reference))
		$reference = (int)$reference;

	if(!empty($entity))
		$entity = (int)$entity;
	
	// EFETUAR O CALCULO CONFORME A DOCUMENTACAO
	$toHash = base64_encode(hash('sha512', $posAutCode, true)) . $messageType . $clearingPeriod . $transactionID
			. $merchantReference . $merchantSession .
	        ((int)((float)$amount * 1000)) . $messageID . $pan .
	        $merchantResponse . $timestamp . $reference .
	        $entity . $clientReceipt . $additionalErrorMessage .
	        $reloadCode
		;

	return base64_encode(hash('sha512', $toHash, true));
}