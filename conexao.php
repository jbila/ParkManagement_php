<?php
$server="localhost";
$user  ="root";
$senha ="MellannieBila";
$db    ="crud";

if($conn=mysqli_connect($server, $user, $senha, $db) ){
 //echo "Conectado com sucesso";
} else
echo "erro";


?>