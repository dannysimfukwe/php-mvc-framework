<?php
//This Model uses an EloquentModel

use Illuminate\Database\Eloquent\Model as DB;

class User extends DB {
    protected $fillable = ['first_name', 'last_name'];
    public $timestamps = false;

    public function __construct () {
        ILLUMINATE::connect();
    }
}

