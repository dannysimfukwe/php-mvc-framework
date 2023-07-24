<?php
//illuminate database
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;
use Illuminate\Database\Capsule\Manager as Capsule;

class ILLUMINATE {
    public static function connect() {
           //Set the default timezone
        date_default_timezone_set('Africa/Johannesburg');

        $db_user = $_ENV["DB_USERNAME"];
        $db_pass = $_ENV["DB_PASSWORD"];
        $db_name = $_ENV["DB_DATABASE"];
        $db_host = $_ENV["DB_HOST"];

        $capsule = new Capsule;

        $capsule->addConnection([
            'driver' => 'mysql',
            'host' => $db_host,
            'database' => $db_name,
            'username' => $db_user,
            'password' => $db_pass,
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
        ]);

        // Set the event dispatcher used by Eloquent models... (optional)
        $capsule->setEventDispatcher(new Dispatcher(new Container));

        // Make this Capsule instance available globally via static methods... (optional)
        $capsule->setAsGlobal();

        // Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
        $capsule->bootEloquent();

        return $capsule;
    }
}


