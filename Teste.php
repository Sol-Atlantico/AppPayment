<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>jQuery.getJSON demo</title>
    <style>
        img {
            height: 100px;
            float: left;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
</head>

<body>
    <?php 
        $url = "https://www.yii2.solatlantico.cv/passes/view-status";
        $accessToken = "5LEsQyHOG2cwN3osXVVS";
        
        $defaults = [
            CURLOPT_URL => sprintf("%s?%s&%s", $url, http_build_query(['cod' =>'2011108']), http_build_query(['access-token' =>$accessToken])),
            CURLOPT_HEADER => 0,
            CURLOPT_TIMEOUT => 10,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_HTTPAUTH => CURLAUTH_BASIC,
            CURLOPT_RETURNTRANSFER => 1,
            /*CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Cache-Control: no-cache, no-store, must-revalidate',
                'Pragma: no-cache',
                'Expires: 0',
            )*/
        ];

        $curl = curl_init();
        curl_setopt_array($curl, $defaults);

        if(!$result = curl_exec($curl)){
            trigger_error(curl_error($curl));
        }        
        curl_close($curl);
        echo $result;

    ?>

    <div id="images"></div>

    <script>
        $.ajax({
				type: 'GET',
				url: 'https://www.yii2.solatlantico.cv/api/inspeccoes',
                header: {
                    'Content-Type': 'application/json',
                    'Cache-Control': 'no-cache, no-store, must-revalidate',
                    'Pragma': 'no-cache',
                    'Expires': '0'
                },
				success: function(response) {
					console.log(response);
				}
			}).fail(function() {
				alert("failed!");
		});
            /*var SolAPI = "https://www.yii2.solatlantico.cv/api/inspeccoes";
            $.getJSON(SolAPI, {
                tagmode: "any",
                format: "json"
            })
                .done(function (data) {
                    $.each(data.items, function (i, item) {
                        console.log(item);
                    });
                });*/
    </script>

</body>

</html>