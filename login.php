<?php
//Ver. 1.1 Sep-13
require('template/class.TemplatePower.inc.php');
session_start();
$mod = $_POST['mod'];
$acc = $_POST['acc'];
if(!isset($mod)){
    $mod = $_GET['mod'];
    $acc = $_GET['acc'];
}
if(isset($mod)){
    if($mod == 'log'){
        if(isset($acc)){
            if($acc == "in"){//Verifica que sea Inicio de SesiÃ³n.
                $estafeta  = $_POST['estafeta'];//Estafeta
                $pass  = $_POST['pass'];//Estafeta
                include("config/connect.php");
          		$sql ="SELECT * FROM usuarios WHERE estafeta ='".$estafeta."' AND password = '".$pass."'";
                $rs = mssql_query($sql,$conn);
	            $validado = false;
		        while($row = mssql_fetch_row($rs)){
                    if($row[1] == $estafeta && $row[2] == $pass){
                            $validado     = true;
                            $_SESSION['estafeta'] = $row[1];
                            $_SESSION['perfil'] = $row[3];
                    }
                }
                if($validado){
                    echo"<script type='text/javascript'>
                    window.location='index.php';
                </script>";

			       // include('template/header.php');
                   // include('subasta/consultaSubasta.php');
                    //include('template/footer.php');
                }else{
                    echo"<script type='text/javascript'>
                            alert('Usuario incorrecto');
                            window.location='index.php';
                        </script>";
                }
                //************************************
                include("config/disconnect.php");
            }else if($acc == "out"){
                unset($_SESSION['nombre']);
                unset($_SESSION['unidad']);
                unset($_SESSION['puesto']);
	            unset($_SESSION['estafeta']);
                unset($_SESSION['clave']);
	            unset($_SESSION['perfil']);
                session_start();
               echo"<script type='text/javascript'>
                    window.location='index.php';
                </script>";
            }
        }
    }
}