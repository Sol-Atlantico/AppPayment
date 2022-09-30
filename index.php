<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<title>Compra efetuado pelo comerciante</title>

	<link rel="stylesheet" href="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <style>
    .mdc-text-field{
      height: 40px;
      margin-top: 25px;
      width: 100%;
    }

    #btn{
      height: 40px;
      margin-top: 15px;
      /* color: aqua; */
      background-color: #007CBA;
    }

    #colun1, #colun2{
      display: flex;
      flex-direction: column;
    }

    .col-69{
      display: none
    }

    .mdc-select--outlined .mdc-select__anchor{
      margin-top: 25px;
      height: 40px;
    }
    
    .mdc-select--outlined{
      width: 100%
    }

  </style>
</head>
<body>
<script>
  function verifieCod(codigo) {
    if ($.isNumeric(codigo) && codigo.length == 7) {
      console.log('1');
      console.log( 'tamanho: ' + codigo.length);
      return true;
    } else {
      console.log('2');
      return false;
    }
  }

  $(document).ready(function() {
    $('#btn').click(function() {
      var cod = $('#referenceNumber').val();
      console.log(cod);
      if (cod != null) { 
        if (verifieCod(cod)) {
          $.get('ApiCall.php', {codigo: cod}, function (response) {
              var card = JSON.parse(response)
              alert("action performed successfully");
              console.log(card.tipo);
          });
          
        } else {
          console.log('error')
        } 
      }
    });

    $('.estudante').click(function(){
      $('#amount').val('2300');
    });
    $('.geral').click(function(){
      $('#amount').val('2900');
      console.log($('#amount').val());
    });
    $('.idoso').click(function(){
      $('#amount').val('2100');
      console.log($('#amount').val());
    });
    $('.5viagen').click(function(){
      $('#amount').val('215');
      var con = $('#amount').val();
      console.log(con);
      alert(con);
    });
    $('.10viagen').click(function(){
      $('#amount').val('430');
      console.log($('#amount').val());
    });
    $('.15viagen').click(function(){
      $('#amount').val('645');
      console.log($('#amount').val());
    });
  });

</script>	
	<div class="container">
		<form method="post" id="form1" action="<?php echo htmlspecialchars("postback.php");?>">
			<div class="row">
				<div>
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

          <div class="mdc-select mdc-select--outlined">
  <div class="mdc-select__anchor" aria-labelledby="outlined-select-label">
    <span class="mdc-notched-outline">
      <span class="mdc-notched-outline__leading"></span>
      <span class="mdc-notched-outline__notch">
        <span id="outlined-select-label" class="mdc-floating-label">Montante</span>
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
  <div class="mdc-select__menu demo-width-class mdc-menu mdc-menu-surface">
          <ul class="mdc-list">
            <li class="mdc-list-item" data-value="">
              <span class="mdc-list-item__ripple"></span>
            </li>
            <li class="mdc-list-item estudante" data-value="estudante">
              <span class="mdc-list-item__ripple"></span>
              <span class="mdc-list-item__text">Estudante (2300$00)</span>
            </li>
            <li class="mdc-list-item geral" data-value="geral" aria-selected="true">
              <span class="mdc-list-item__ripple"></span>
              <span class="mdc-list-item__text">Geral (2900$00)</span>
            </li>
            <li class="mdc-list-item idoso" data-value="idoso">
              <span class="mdc-list-item__ripple"></span>
              <span class="mdc-list-item__text">3ª Idade (2100$00)</span>
            </li>
            <li class="mdc-list-item 5viagen" data-value="5viagen">
              <span class="mdc-list-item__ripple"></span>
              <span class="mdc-list-item__text">5 Viagens (215$00)</span>
            </li>
            <li class="mdc-list-item 10viagen" data-value="10viagen">
              <span class="mdc-list-item__ripple"></span>
              <span class="mdc-list-item__text">10 Viagens (430$00)</span>
            </li>
            <li class="mdc-list-item 15viagen" data-value="15viagen">
              <span class="mdc-list-item__ripple"></span>
              <span class="mdc-list-item__text">15 Viagens (645$00)</span>
            </li>
          </ul>
        </div>


				<div class="col-69">
					<div class="form-group">
						<label for="amount">amount</label>
						<input type="number" class="form-control" id="amount" name="amount">
					</div>
				</div>
			</div>
			<div class="col-6">
				<button id="btn" class="mdc-button mdc-button--raised">
					<span class="mdc-button__label">Recarregar</span>
				</button>
			</div>		
		</form>
	</div>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/js-sha512/0.8.0/sha512.js"></script>
	<script src="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.js"></script>
	<script type="text/javascript" src="/material-components-web-catalog/static/js/main.a88a1f88.js"></script>
    
	<script>
    mdc.select.MDCSelect.attachTo(document.querySelector('.mdc-select'));
		mdc.textField.MDCTextField.attachTo(document.querySelector('.mdc-text-field'));
  </script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	
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