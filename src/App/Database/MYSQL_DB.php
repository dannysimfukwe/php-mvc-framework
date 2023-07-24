<?php

class MYSQL_DB {

    public static function connect() {

         //Set the default timezone
        date_default_timezone_set('Africa/Johannesburg');

        $db_user = $_ENV["DB_USERNAME"];
        $db_pass = $_ENV["DB_PASSWORD"];
        $db_name = $_ENV["DB_DATABASE"];
        $db_host = $_ENV["DB_HOST"];

        return new MySQLPool(10, $db_host, $db_user, $db_pass, $db_name);

    }

}