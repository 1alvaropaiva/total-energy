<?php 
define('HOST', 'localhost');
define('USUARIO', 'anajulia');
define('SENHA', '');
define('DB', 'ttenergy');

$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('died');
?>