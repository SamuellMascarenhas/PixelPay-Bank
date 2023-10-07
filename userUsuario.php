<?php

require_once("Conn.php");

class usuario extends conn{

    public object $conn;
    public array $formData;
    public int $id;

    public function list() : array{
        $this->conn = $this->connect();
        $query_users = "SELECT id, nome, email FROM usuario ORDER BY id DESC LIMIT 40";

        $result_users = $this->conn->prepare($query_users);
        $result_users->execute();
        $retorno = $result_users->fetchALL();
        return $retorno;
    }

    public function create() : bool
    {
        $this->conn = $this->connect();
        $query = "INSERT INTO usuario (nome, email, senha) VALUES (:nome, :email, :senha)";
        $addUser = $this->conn->prepare($query);
        $addUser->bindParam(':nome', $this->formData['nome']);
        $addUser->bindParam(':email', $this->formData['email']);
        $addUser->bindParam(':senha', $this->formData['senha']);
        $addUser->execute();

        if($addUser->rowCount()){
            return true;
        } else {  
            return false;
        }
    }

    public function view(){
        $this->conn = $this->connect();
        $query_user = "SELECT id, nome, email, senha FROM usuario
                                        WHERE id= :id
                                        LIMIT 1";
        $result_user = $this->conn->prepare ($query_user);
        $result_user->execute();
        $value = $result_user->fetch();
        return $value;
    }

}
?>