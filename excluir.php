<?php
include("conexao.php");
$contato = new conexao();
if(!empty($_GET['id'])){
    $id = $_GET['id'];
    $contato->excluir($id);
    header("location:ListaUsuario.php");
}?>