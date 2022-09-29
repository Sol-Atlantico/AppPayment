<?php 
    $url = "https://www.yii2.solatlantico.cv/passes/view-status";
    $accessToken = "5LEsQyHOG2cwN3osXVVS";
    $codigo = $_GET['codigo'];
    if(isset($codigo)){
        $defaults = [
            CURLOPT_URL => sprintf("%s?%s&%s", $url, http_build_query(['cod' =>$codigo]), http_build_query(['access-token' =>$accessToken])),
            CURLOPT_HEADER => 0,
            CURLOPT_TIMEOUT => 10,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_HTTPAUTH => CURLAUTH_BASIC,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Cache-Control: no-cache, no-store, must-revalidate',
                'Pragma: no-cache',
                'Expires: 0',
            )
        ];
    
        $curl = curl_init();
        curl_setopt_array($curl, $defaults);
    
        if(!$result = curl_exec($curl)){
            trigger_error(curl_error($curl));
        }        
        curl_close($curl);
        echo $result;
    } else {
        echo 'error';
    }


?>