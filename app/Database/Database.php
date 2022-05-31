<?php

namespace App\Database;
use \PDO;

abstract class DataBase{
    
    private $connection;
    protected $table;

    public function __construct()
    {
        $this->connection = new PDO('mysql:host='. $_ENV['DB_HOST'] .';dbname='. $_ENV['DB_DATABASE'], $_ENV['DB_USER'], $_ENV['DB_PASS']);
    }

    public function all($fields = '*')
    {
        $sql = 'SELECT ' . $fields . ' FROM ' . $this->table;
        $stmt = $this->connection->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find(int $id, $fields = '*')
    {
        return current($this->where(['id' => $id], '=', $fields));
    }

    public function where(array $conditions, $operator = ' AND ', $fields = '*')
    {
        $sql = 'SELECT ' . $fields . ' FROM ' . $this->table . ' WHERE ';

        $binds = array_keys($conditions);
        $where = null;

        foreach($binds as $condition){
            if(is_null($where)){
                $where .= $condition . ' = :' . $condition;
            }else{
                $where .= $operator . $condition . ' = :' . $condition;
            }
        }

        $sql .= $where;
        
        return $this->bind($conditions, $sql);
         
    }

    public function create($data)
    {
        $binds = array_keys($data);
        $sql = 'INSERT INTO ' . $this->table . '('. implode(', ', $binds) .')
         VALUES (:'. implode(', :', $binds) .')';
        return $this->bind($data, $sql);
    }

    public function bind($data, $sql)
    {
        $get = $this->connection->prepare($sql);
        foreach($data as $key => $value){
            if(gettype($value) == 'string'){
                $get->bindValue(':' . $key, $value, PDO::PARAM_STR);
            }else{
                $get->bindValue(':' . $key, $value, PDO::PARAM_INT);
            }
        }
        $get->execute();
        return $get->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update($data)
    {
        if(!array_key_exists('id', $data)){
            throw new \Exception('Não foi possível atualizar o registro. ID não encontrado.');
        }

        $binds = array_keys($data);
        $sql = 'UPDATE ' . $this->table . ' SET ';

        $set = null;
        $binds = array_keys($data);

        foreach($binds as $bind){
            if($bind !== 'id'){
                $set .= is_null($set) ? $bind . ' = :' . $bind : ', ' . $bind . ' = :' . $bind;
            }
        }

        $sql .= $set;
        $sql .= ', updated_at = NOW() WHERE id = :id';

        return $this->bind($data, $sql);
    }

    public function delete(int $id)
    {
        $sql = 'DELETE FROM ' . $this->table . ' WHERE id = :id';
        $get = $this->connection->prepare($sql);
        $get->bindValue(':id', $id, PDO::PARAM_INT);
        $get->execute();
        return $get->fetchAll(PDO::FETCH_ASSOC);
    }
}

