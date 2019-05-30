<?php
    session_start();//Inicia uma nova sessão ou resume uma sessão existente
    include 'conexao.php';
    $logar = new conexao();
    //verificação de login e senha estão corretos
    if(!empty($_POST['login'])){
        $login=$_POST['login'];//obtém o login digitado
        $senha=$_POST['senha'];//obtém a senha digitada
      
        //verificação de login e senha estão corretos
        $logar->logarSistema($login, $senha);
        header("Location index.php");
    }
?>
