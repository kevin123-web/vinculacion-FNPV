<?php 

include("con_db.php");

if (isset($_POST['send'])) {
    if (strlen($_POST['quantity']) >= 1 ) {
	    $quantity = trim($_POST['quantity']);
	    $consulta = "INSERT INTO donate(quantity) VALUES ('$quantity')";
	    $resultado = mysqli_query($conex,$consulta);
	}
}
?>