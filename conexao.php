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
    
    public function getInfo($id){
        $sql = "SELECT * FROM cadastro WHERE id = :id";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':id',$id);
        $sql->execute();
        
        if($sql->rowCount()>0){
            return $sql->fetch();
        }else{
            return array();
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
    public function editar($id,$nome,$email,$telefone,$endereco,$cidade,$bairro,$pais,$login,$senha){
        if(!empty($id)){
            $sql = "UPDATE cadastro "
                    . "SET nome = :nome,email= :email,telefone= :telefone,endereco = :endereco,"
                    . "cidade = :cidade,bairro = :bairro,pais = :pais,login = :login,senha= :senha "
                    . "WHERE id = :id";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(':id',$id);
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
    public function logarSistema($login, $senha) {
        
        if ($this->emailExists($login) == TRUE && $this->senhaExists($senha) == TRUE) {
            
            $sql = "SELECT * FROM cadastro WHERE login = :login AND senha = :senha";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(':login', $login);
            $sql->bindValue(':senha', $senha);
            $sql->execute();

            if ($sql->rowCount() > 0) {
                $array = $sql->fetch();
                $_SESSION['id'] = $array['id'];
                header("Location:index.html");
            } 
        }
        return $array;
    }

    private function emailExists($login) {
        $sql = "SELECT * FROM cadastro WHERE login = :login ";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':login', $login);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    private function senhaExists($senha) {
        $sql = "SELECT * FROM cadastro WHERE senha = :senha ";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':senha', $senha);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
