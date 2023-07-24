<?php

Class PDO_DB {

    public static function connect() {

        //Set the default timezone
        date_default_timezone_set('Africa/Johannesburg');

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