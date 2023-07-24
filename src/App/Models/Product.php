<?php
//This Model uses an EloquentModel

use Illuminate\Database\Eloquent\Model as DB;

class Product extends DB {

    public function __construct () {
        ILLUMINATE::connect();
    }
}

