<?php
// This Model Uses the custom Model class

class TestModel extends Model {
    protected $table = 'test_users';
    protected $columns = ['first_name', 'last_name', 'email_address'];

    public function __construct()
    {
        parent::__construct();
    }

    public static function find($id) {
        return (new self)->getOneById($id);
    }

    public static function all() {
        return (new self)->getAll();
    }

    public static function where($field = null, $value = null) {
        return (new self)->getWhereEql($field, $value);
    }

    public static function whereLike($field = null, $value = null) {
        return (new self)->getWhereLike($field, $value);
    }
}

