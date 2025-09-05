<?php
    session_start();
    $_SESSION['nome'] =['nome'];
  
    
    $_SESSION['preco'] =['preco'];
    $_SESSION['descricao'] =['descricao'] ;
    setcookie("nome" , $_SESSION['nome'] , time() + 7*24*(60*60), '/');
    setcookie("preco" , $_SESSION['preco'] , time() + 7*24*(60*60), '/');
    setcookie("descricao" , $_SESSION['descricao'] , time() + 7*24*(60*60), '/');
    header('Location: login.php');
?>