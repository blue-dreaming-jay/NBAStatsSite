<?php
namespace App\Models;
use PDO;

class Bullshit {
    public $connection;

    public function __construct($config, $username, $password){
    
        $dsn="mysql:" . http_build_query($config, '', ';');
        $this->connection=new PDO($dsn, $username, $password, [PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC]);
    }

    public function query($request, $params=[]){

        $statement=$this->connection->prepare($request);

        $statement -> execute($params);

        return $statement;
    }
}

?>