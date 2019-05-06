<?php
//conectar com o banco
include("conexao.php");

//recebendo os dados do formulário
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
$sexo = filter_input(INPUT_POST, 'sexo', FILTER_SANITIZE_STRING);
$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
$endereco = filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_STRING);
$cidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING);
$bairro = filter_input(INPUT_POST, 'bairro', FILTER_SANITIZE_STRING);
$pais = filter_input(INPUT_POST, 'pais', FILTER_SANITIZE_STRING);
$login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING);
$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
//enviar dados para o banco
$sql = "INSERT INTO cadastro (nome,email,telefone,endereco,cidade,bairro,pais,login,senha) VALUES ('$nome','$email','$telefone','$endereco','$cidade','$bairro','$pais','$login','$senha')";
//nome	email	telefone	endereco	cidade	bairro	pais	login	senha

//testar se a inclusão no banco foi feita com sucesso
if ($conn->query($sql) === TRUE) {
    echo "<script>
    alert('Cadastro realizado com sucesso');
    window.location.href = 'cadastro.html';
    </script>";
} else {
    echo "<script>
            alert('Erro no cadastro');
            window.location.href = 'cadastro.html';
        </script>";
}
?>
