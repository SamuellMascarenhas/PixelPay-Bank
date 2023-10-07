<?php

abstract class Conn
{
    public string $db ="mysql"; // tipo de banco
    public string $host ="localhost"; // nome do host no caso local
    public string $user="root"; // padrão
    public string $password=""; // padrão
    public string $dbname="estudos";
    public int $port=3306;
    public object $connect;

    public function connect(){
        //Instanciação do método conectar a partir do atributo conect que com a biblioteca pdo realiza a conexão com o banco no bloco try catch
        try{
            $this->connect= new PDO($this->db.':host='.$this->host.';port='.$this->port.';dbname='.$this->dbname,$this->user,$this->password);
            //echo "Conexão realizada com sucesso!";
            return $this->connect;
        }
        catch(Exception $err){
                echo "Tente mais tarde ou entre em contato com o administrador".$err;
        }
    }
}
    
?>