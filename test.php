<?php

	include("lib.php");

	$posAutCode = "123456789A";

$rec = "          Pagamento de Servicos
       N. Movimento Cartao: 0

   Empresa: IMPAR SEGUROS, SARL
   Morada: Avenida Amilcar Cabral
   Capital Social: 400.000.000 CVE
   N Contribuinte: 200491377
   Reg Cons.: 297/920109

          Entidade: 8
          Referencia: 123456789
          Montante: 1.000$00 ESCUDO

  
 --------------------------------------

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   ";


$rec = preg_replace("/[\n]*/", "\n", $rec); 

$rec = preg_replace("/[ \t]*/", " ", $rec); 

$rec = preg_replace("/[\n]/", "", $rec);
$rec = preg_replace("/[\s]/", "", $rec); 

	// CALCULAR FINGERPRINT
	$fingerPrintCalculado = GerarFingerPrintRespostaBemSucedida(
	    $posAutCode , "P" , "0379" ,
        "00001550" , "R20190315145450" , "S20190315145450" ,
        "1000.00" , "2khHzL56y4VnuKf4cpU8" , "************0248" ,
        "C" , "2019-03-15 14:52:19", "123456789" ,
        "8" , trim($rec) , "" ,
        ""
	);

	echo "Recebido: HHONbYo7MwurLfK63HsTYoReyM+mEH+LQDWtDLlSbSMOOiwin01+uVWIEZkVy+lTdNuIGIcnaAzNhuF3YQbFhA==<br>";
	echo "Calculad: " . $fingerPrintCalculado . "<br>";
	die();

?>