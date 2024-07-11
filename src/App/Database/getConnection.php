<?php
date_default_timezone_set('Africa/Johannesburg');

use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;
use Illuminate\Database\Capsule\Manager as Capsule;

interface ConnectionType {
    public function connect();
}

abstract class DbConnection implements ConnectionType {

}

class Eloquent extends DbConnection {

    public function connect() {
        $db_user = $_ENV["DB_USERNAME"];
        $db_pass = $_ENV["DB_PASSWORD"];
        $db_name = $_ENV["DB_DATABASE"];
        $db_host = $_ENV["DB_HOST"];
        $db_port = $_ENV["DB_PORT"];
        $capsule = new Capsule;

        $capsule->addConnection([
            'driver' => 'mysql',
            'host' => $db_host,
            'database' => $db_name,
            'username' => $db_user,
            'password' => $db_pass,
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'strict'    => false,
            'engine'    => null,
            'prefix' => '',
            'port' => $db_port
        ]);

        $capsule->setEventDispatcher(new Dispatcher(new Container));

        $capsule->setAsGlobal();

        $capsule->bootEloquent();

        return $capsule;
    }
}

class MYSQL_DB extends DbConnection {

    public function connect() {

        $db_user = $_ENV["DB_USERNAME"];
        $db_pass = $_ENV["DB_PASSWORD"];
        $db_name = $_ENV["DB_DATABASE"];
        $db_host = $_ENV["DB_HOST"];

        return new MySQLPool(10, $db_host, $db_user, $db_pass, $db_name);

    }

}

Class PDO_DB extends DbConnection {

    public function connect() {

        $db_user = $_ENV["DB_USERNAME"];
        $db_pass = $_ENV["DB_PASSWORD"];
        $db_name = $_ENV["DB_DATABASE"];
        $db_host = $_ENV["DB_HOST"];

        try {
            $db = new PDO('mysql:host='.$db_host.';
                            dbname='.$db_name.';
                            charset=utf8',
                            $db_user, $db_pass
                        );

            $db->setattribute(PDO::ATTR_EMULATE_PREPARES, false);
            $db->setattribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
            $db->setattribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $db;


        }catch (PDOException $e) {
            die('DB Connection Error: '. $e->getMessage());
        }

    }
}

class getConnection {
    public static function adapter($type) {
        return match($type) {
            'eloquent' => (new Eloquent)->connect(),
            'mysql' => (new MYSQL_DB)->connect(),
            'pdo' => (new PDO_DB)->connect(),
            default => throw new Exception("Invalid connection type")
        };
    }
}

