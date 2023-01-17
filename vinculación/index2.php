<?php 
        include("index.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Donaciones</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="https://www.paypal.com/sdk/js?client-id=AbIQMS6FeSOmuskYuf9eUUhBtZtc2ZH3nZhP8JfxzgGrQpP15KHJaEwpnuBN8rXPW2ZR7cgI3_SjKUhq&currency=USD"></script>
</head>
<body>
    <form method="post">
    	<h1>Doncaciones</h1>
    	<input type="number" name="quantity" placeholder="Cantidad de donaciones" step="any">
    	<input type="submit" name="send">
    </form>

	<div id="paypal-button-container"></div>
          <script>
            paypal.Buttons({
                style:{
                    color: 'blue',
                    shape: 'pill',
                    label: 'pay'
                },
                createOrder: function(data, actions){
                  return actions.order.create({
                    purchase_units: [{
                      amount: {
                        value : <?php echo $quantity?>
                      }
                    }]
                  })
                },
                onApprove: function(data, actions){
                  actions.order.capture().then(function(detalles){
                    window.location.href='completado.php'
                  });
                },
                onCancel: function(data){
                  alert("Donación Cancelado")
                  console.log(data)
                }
             }).render('#paypal-button-container');
          </script>
</body>
</html>