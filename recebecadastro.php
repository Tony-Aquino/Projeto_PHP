<?php
//conectar com o banco
include("conexao.php");
$contato = new conexao();
//recebendo os dados do formulário
if(!empty($_POST['email'])){
    
$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$endereco = $_POST['endereco'];
$cidade = $_POST['cidade'];
$bairro = $_POST['bairro'];
$pais = $_POST['pais'];
$login = $_POST['login'];
$senha = $_POST['senha'];

$contato->adicionar($nome, $email, $telefone, $endereco, $cidade, $bairro, $pais, $login, $senha);

header("location:ListaUsuario.php");
}
?>