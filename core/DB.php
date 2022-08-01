<?php

namespace core;

use core\traits\TSingleton;

class DB
{
    use TSingleton;

    protected $pdo;

    protected function __construct()
    {
        $db = require CONFIG . 'database.php';
        $options = [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
        ];
        $this->pdo = new \PDO($db['dsn'], $db['user'], $db['password'], $options);
    }

    public function execute($sql, $params = [])
    {
        $statement = $this->pdo->prepare($sql);
        return $statement->execute($params);
    }

    public function query($sql, $params = [], $isObj = false)
    {
        $statement = $this->pdo->prepare($sql);
        $result = $statement->execute($params);
        if($result !== false){
            $queryType = $isObj ? 'fetchObject' : 'fetchAll';
            return $statement->$queryType();            
        }
        return [];
    }

    
}