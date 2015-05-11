<?php
include('miss/mensajes.php');
if (!isset($_SESSION['estafeta'])){
	          // echo "<script> alert('Pasaste mucho tiempo inactivo, Ingresa nuevamente');</scrip> ";
            // echo"<script type='text/javascript'>
             //       window.location='index.php';
             //   </script>";
  			//exit;
}
else{
  $_username=$_SESSION['usuario'];
}
?>
