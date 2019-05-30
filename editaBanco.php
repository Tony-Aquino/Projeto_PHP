<?php
include 'conexao.php';
$conexao = new conexao();

if (!empty($_POST['id'])){
    $id = $_POST["id"];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];
    $cidade = $_POST['cidade'];
    $bairro = $_POST['bairro'];
    $pais = $_POST['pais'];
    $login = $_POST['login'];
    $senha = $_POST['senha'];
    
    $conexao->editar($id, $nome, $email, $telefone, $endereco, $cidade, $bairro, $pais, $login, $senha);
    header("Location:ListaUsuario.php");
    
}
?>

