<!DOCTYPE html>
<?php
include 'conexao.php';
$contato = new conexao();
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Adoção Legal</title>
        <link rel="stylesheet" href="style.css" type="text/css" charset="utf-8" />
    </head>
    <body>
        <div id="wrapper">
            <div id="header">
                <h1>Usuário</h1>
                <div id="nav-top">
                    <ul>
                        </li>
                    </ul>
                </div>

                <div id="nav">
                    <ul>
                        <li class="home"><a href="index.html">Home</a></li>
                        <li><a href="cadastro.html">Cadastro</a></li>
                        <li><a href= "adotar.html">Adotar</a></li>
                        <li><a href= "contato.html">Contato</a></li>
                    </ul></div><br>
                    <a href="cadastro.html"><h2 style="color: yellow;">Cadastrar novo usuário</h2></a><br>
                <table width="625" border="1">
                    <tr>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Telefone</th>
                        <th>Endereço</th>
                        <th>Cidade</th>
                        <th>Bairro</th>
                        <th>País</th>
                        <th>Login</th> 
                        <th>Opçao</th>
                    </tr>
                    <?php $lista = $contato->getAll();
                    foreach($lista as $item):
                    ?>
                    <tr>
                        <td><?php echo $item['nome'];?></td>
                        <td><?php echo $item['email'];?></td>
                        <td><?php echo $item['telefone'];?></td>
                        <td><?php echo $item['endereco'];?></td>
                        <td><?php echo $item['cidade'];?></td>
                        <td><?php echo $item['bairro'];?></td>
                        <td><?php echo $item['pais'];?></td>
                        <td><?php echo $item['login'];?></td>
                        <td>
                            <a style="color: yellow;" href="editar.php?id=<?php echo$item['id'];?>">[EDITAR]</a>
                            <a style="color: yellow;" href="excluir.php?id=<?php echo$item['id'];?>">[EXCUIR]</a>
                        </td>
                    </tr>
                    <?php endforeach;?>
                </table>
                <div class="clear" id="footc"> </div>
                <div id="footer"> Todos os parceiro são responsavél pelo seu serviços, o site só é um lugar de divulgação, não temos responsabilidade com os serviços prestados.</div>
            </div>
    </body></html>
