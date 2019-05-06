<?php
    session_start();//Inicia uma nova sessão ou resume uma sessão existente
    
    $login=$_GET['login'];//obtém o login digitado
    $senha=$_GET['senha'];//obtém a senha digitada
      
    //verificação de login e senha estão corretos
    $tenta_achar = "SELECT * FROM usuarios WHERE nome='$login' AND senha='$senha'" ;
    $resultado = $tenta_conectar->query($tenta_achar);
    if ($resultado->num_rows > 0) {
        $_SESSION['login'] = $login;
        $_SESSION['senha'] = $senha;
        header('location:acesso.php');//redireciona para a página de acesso
    }
    else{
        session_unset();//remove todas as variáveis de sessão
        session_destroy();//destroi a sessão
        echo "<script> 
                alert('Login ou senha incorreto');
                window.location.href = 'login.html';
            </script>";
      }
?>
