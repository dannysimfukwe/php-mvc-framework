<?php

class Model {

    protected $connection;
    protected $table;
    protected $columns;
    protected $results;

    public function __construct() {
        if($_ENV['DB_CONNECTION'] == 'pdo') {
            $this->connection = getConnection::ConnectUsing('pdo');
        }else if($_ENV['DB_CONNECTION'] == 'mysql') {
            $this->connection = getConnection::ConnectUsing('mysql');
        }
    }


    public function getOneById(int $id) {
        try {
            if($_ENV['DB_CONNECTION'] == 'pdo') {
            $query = 'SELECT * FROM '.$this->table.' WHERE id='.$id;
            $stmt = $this->connection->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
            }else{
                $mysqlPool = $this->connection;
                $queryFiber = new Fiber(function() use ($mysqlPool, $id){

                    $result = Async::await($mysqlPool->execute(
                        "SELECT * FROM `{$this->table}`  WHERE `id` = :id",
                        [":id" => $id]
                    ));

                    $this->results = $result->fetch_assoc();
                });
                $queryFiber->start();
                Async::run();
                return [$this->results];
            }
        } catch (\Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function getAll()
    {
        try {
            $query = 'SELECT * FROM '.$this->table . ' WHERE 1';
            $stmt = $this->connection->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function getWhereEql($field = null, $value = null) {
        try {
            if($_ENV['DB_CONNECTION'] == 'pdo') {
                $query = 'SELECT * FROM ' . $this->table . ' WHERE `'.$field.'`="'.$value.'"';
                $stmt = $this->connection->prepare($query);
                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }else {
                $mysqlPool = $this->connection;
                $queryFiber = new Fiber(function() use ($mysqlPool, $field, $value){

                    $result = Async::await($mysqlPool->execute(
                        'SELECT * FROM ' . $this->table . ' WHERE `'.$field.'`="'.$value.'"'
                    ));

                    $this->results = $result->fetch_assoc();

                });
                $queryFiber->start();
                Async::run();
                return [$this->results];
            }

        } catch (\Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function getWhereLike($field = null, $value = null) {
        try {
            if($_ENV['DB_CONNECTION'] == 'pdo') {
            $query = 'SELECT * FROM ' . $this->table . ' WHERE `'.$field.'` LIKE "%'.$value.'%"';
            $stmt = $this->connection->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }else{
                $mysqlPool = $this->connection;
                $queryFiber = new Fiber(function() use ($mysqlPool, $field, $value){

                    $result = Async::await($mysqlPool->execute(
                        'SELECT * FROM ' . $this->table . ' WHERE `'.$field.'` LIKE "%'.$value.'%"'
                    ));

                    $this->results = $result->fetch_assoc();

                });
                $queryFiber->start();
                Async::run();
                return [$this->results];
            }
        } catch (\Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}