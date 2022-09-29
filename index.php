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
    }

    #btn{
      height: 40px;
      margin-top: 15px;
      /* color: aqua; */
      background-color: #007CBA;
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
  });

</script>	
	<div class="container">
		<form method="post" id="form1" action="<?php echo htmlspecialchars("postback.php");?>">
			<div class="row">
				<div>
					<!-- Render Select component -->
					<!--<div class="mdc-select mdc-select--outlined">
            <div class="mdc-select__anchor" aria-labelledby="outlined-select-label">
              <span class="mdc-notched-outline">
                <span class="mdc-notched-outline__leading"></span>
                <span class="mdc-notched-outline__notch">
                  <span id="outlined-select-label" class="mdc-floating-label">Tipo de Passe</span>
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
            </div> -->
          
            <!-- Other elements from the select remain. -->
            <!--<div class="mdc-select__menu mdc-menu mdc-menu-surface mdc-menu-surface--fullwidth">
                <ul class="mdc-deprecated-list" role="listbox" aria-label="Food picker listbox">
                    <li class="mdc-deprecated-list-item" aria-selected="false" data-value="geral" role="option">
                      <span class="mdc-deprecated-list-item__ripple"></span>
                      <span class="mdc-deprecated-list-item__text">
                        Geral
                      </span>
                    </li>
                    <li class="mdc-deprecated-list-item " aria-selected="false" data-value="estudante" role="option">
                      <span class="mdc-deprecated-list-item__ripple"></span>
                      <span class="mdc-deprecated-list-item__text">
                        Estudante
                      </span>
                    </li>
                    <li class="mdc-deprecated-list-item" aria-selected="false" data-value="3idade" role="option">
                      <span class="mdc-deprecated-list-item__ripple"></span>
                      <span class="mdc-deprecated-list-item__text">
                        3ª Idade
                      </span>
                    </li>
                  </ul>
            </div>
          </div>
					</div> -->
					
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
				</div>

        <div>
          <p>Passe Estudante</p>
        </div>

        <div id="chips" >
          <!-- Render chip components -->
          <div class="mdc-chip-set" role="grid">
              <div class="mdc-chip mdc-ripple-upgraded" role="row" id="mdc-chip-26">
                  <div class="mdc-chip__ripple"></div>
                  <div class="mdc-chip__text">Selo (2500$00)</div><span role="gridcell"><span role="button" tabindex="0"
                          class="mdc-chip__text"></span></span>
              </div>
              <div class="mdc-chip mdc-ripple-upgraded" role="row" id="mdc-chip-27">
                  <div class="mdc-chip__ripple"></div>
                  <div class="mdc-chip__text">5 Viagens (215$00)</div><span role="gridcell"><span role="button" tabindex="0"
                          class="mdc-chip__text"></span></span>
              </div>
              <div class="mdc-chip mdc-ripple-upgraded" role="row" id="mdc-chip-28">
                  <div class="mdc-chip__ripple"></div>
                  <div class="mdc-chip__text">10 Viagens (430$00)</div><span role="gridcell"><span role="button" tabindex="0"
                          class="mdc-chip__text"></span></span>
              </div>
              <div class="mdc-chip mdc-ripple-upgraded" role="row" id="mdc-chip-29">
                  <div class="mdc-chip__ripple"></div>
                  <div class="mdc-chip__text">15 Viagens (645$00)</div><span role="gridcell"><span role="button" tabindex="0"
                          class="mdc-chip__text"></span></span>
              </div>
          </div>
        </div>

				<!--<div class="col-6">
					<div class="form-group">
						<label for="amount">amount</label>
						<input type="number" class="form-control" id="amount" value="1000" name="amount">
					</div>
				</div>-->
			</div>
			<div class="col-6">
				<!--<button id="btn" class="mdc-button mdc-button--raised">
					<span class="mdc-button__label">Recarregar</span>
				</button>	-->
			</div>		
		</form>
    <button id="btn" class="mdc-button mdc-button--raised">
					<span class="mdc-button__label">Recarregar</span>
				</button>
	</div>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/js-sha512/0.8.0/sha512.js"></script>
	<!-- Required Material Web JavaScript library -->
	<script src="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.js"></script>
	<script type="text/javascript" src="/material-components-web-catalog/static/js/main.a88a1f88.js"></script>
    <!-- Instantiate single textfield component rendered in the document -->
    
	<script>
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