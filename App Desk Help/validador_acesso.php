<?php 
  session_start();
  
  // Leia: Se o valor de SESSION nao existir ou for diferente de SIM, faca
  if(!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] != 'SIM'){
    header('Location: index.php?login=erro2');
  }
  
?>