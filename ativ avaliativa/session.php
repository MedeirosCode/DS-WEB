<?php

session_start();

$_SESSION['nome'] =['nome'];
$_SESSION['email'] =['email'] ;
setcookie("email" , $_SESSION['email'] , time() + 7*24*(60*60), '/');

echo 'variavel criada com sucesso';

?>