<!DOCTYPE html>
<script src="../assets/js/mascara.js" type="text/javascript"></script>
<script src="../assets/js/mascara.min.js" type="text/javascript"></script>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body class="bg-primary">
        <div class="container">
            <div class="row py-5">
                <div class="col-sm-1">

                </div>
                <div class="col-sm-10  py-4 bg-white">
                    <h3>Adicionar usuário</h3>
                    <form method="POST" action="<?php echo BASE_URL; ?>usuario/addUsuario">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>E-mail</label>
                                <input type="text" class="form-control" name="email" placeholder="E-mail">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Password</label>
                                <input type="password" class="form-control" autocomplete="new-password" name="senha" placeholder="Senha">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Nome</label>
                                <input type="text" class="form-control" name="nome" placeholder="Nome">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Telefone</label>
                                <input type="text" class="form-control" name="telefone" id="celular" placeholder="Telefone" onkeyup="mascara('(##)#####-####',this,event,true)" maxlength="14">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">CPF</label>
                                <input type="text" class="form-control" name="cpf" id="cpf" placeholder="CPF" onkeyup="mascara('###.###.###-##',this,event,true)" maxlength="14">
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Perfil</label>
                                <select class="form-control" id="tipoUsuario" name="tipoUsuario">
                                    <?php foreach ($listar as $tipo){ ?>
                                    <option value="<?= $tipo['codigo'];?>"><?php echo $tipo['descricao'];?></option>
                                    <?php }?>
                                </select>
                             </div>
                            
                            <div class="form-group col-md-6">
                                <label for="example-date-input">Ano de formação</label>
                                <input class="form-control" name="anoFormacao" type="date"  id="example-date-input">
                            </div>
                        </div> 
                        <input type="submit" class="btn btn-primary" value="Adicionar Novo Usúario">
                    </form>
                </div>
                <div class="col-sm-1">

                </div>
            </div>
        </div>
    </body>
</html>


