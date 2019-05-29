<?php
class conexao {
    private $pdo;
    
    public function __construct() {
        $this ->pdo = new PDO ("mysql:dbname=adocao_legal;hot=localhost","root","");
    }
    public function adicionar($nome,$email,$telefone,$endereco,$cidade,$bairro,$pais,$login,$senha){
        if($this->existeEmail($email)==false){
            $sql = "INSERT INTO cadastro (id, nome,email,telefone,endereco,cidade,bairro,pais,login,senha) "
             . "VALUES (null,:nome,:email,:telefone,:endereco,:cidade,:bairro,:pais,:login,:senha)";
            
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(':nome',$nome);
            $sql->bindValue(':email',$email);
            $sql->bindValue(':telefone',$telefone);
            $sql->bindValue(':endereco',$endereco);
            $sql->bindValue(':cidade',$cidade);
            $sql->bindValue(':bairro',$bairro);
            $sql->bindValue(':pais',$pais);
            $sql->bindValue(':login',$login);
            $sql->bindValue(':senha',$senha);
            $sql->execute();
            
            return true;
        } else{
            return false;
        }
    }
    
    public function getNome($email){
        $sql = "SELECT nome FROM cadastro WHERE email = :email";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':email',$email);
        $sql->execute();
        
        if($sql->rowCount()>0){
            $info = $sql->fetch();
            return$info['nome'];
        }else{
            return '';
        }
    }
    public function getAll(){
        $sql = "SELECT * FROM cadastro";
        $sql = $this->pdo->query($sql);
        
        if($sql->rowCount()>0){
            return $sql->fetchAll();
        }else{
            return array();
        }
    }
    public function editar($nome,$email,$telefone,$endereco,$cidade,$bairro,$pais,$login,$senha){
        if($this->existeEmail($email)==TRUE){
            $sql = "UPDATE cadastro "
                    . "SET nome = :nome,email= :email,telefone= :telefone,endereco = :endereco,"
                    . "cidade = :cidade,bairro = :bairro,pais = :pais,login = :login,senha= :senha "
                    . "WHERE email = :email";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(':nome',$nome);
            $sql->bindValue(':email',$email);
            $sql->bindValue(':telefone',$telefone);
            $sql->bindValue(':endereco',$endereco);
            $sql->bindValue(':cidade',$cidade);
            $sql->bindValue(':bairro',$bairro);
            $sql->bindValue(':pais',$pais);
            $sql->bindValue(':login',$login);
            $sql->bindValue(':senha',$senha);
            $sql->execute();
            
            return TRUE;
        }else{
            return FALSE;
        }
    }
    
    public function excluir($id){
            $sql = "DELETE FROM cadastro WHERE id=:id";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(':id', $id);
            $sql->execute();
    }
    private function existeEmail($email){
        $sql = "SELECT * FROM cadastro WHERE email = :email";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':email', $email);
        $sql->execute();
        
        if($sql->rowCount()>0){
            return TRUE;
        }else{
            return false;;
        }
    }
}
