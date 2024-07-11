<?php
use Illuminate\Database\Eloquent\Model as DB;

class Post extends DB {
    protected $fillable = ['title', 'description', 'author'];
    public $timestamps = true;

    public function __construct () {
        try {
            getConnection::adapter('eloquent');
        }   catch (\Exception $e) {
            die($e->getMessage());
        }
    }
}