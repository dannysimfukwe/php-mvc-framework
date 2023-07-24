<?php
use Carbon\Carbon;
use Respect\Validation\Validator as validate;

class UserController extends Controller
{
    public function index($params) {
        $like_users = User::all();
        $users = User::where('id', 1)->get();
        return View::render('users/index', ['users' => $users, 'like_users' => $like_users]);
    }

    public function recreateUser() {
        $first_name = Request::post('first_name');
        $last_name  = Request::post('last_name');

        $usernameValidator = validate::alnum()->noWhitespace()->length(1, 15);
        $usernameValidator->validate($first_name);

        if($usernameValidator) {
            $user = (new User)->fill([
                'first_name' => $first_name,
                'last_name' => $last_name
            ])->save();
        }

        return json_encode($user);
    }

    public function updateUser($params) {
        return print('Updating user - '.$params[0]);
    }

    public function deleteUser($params) {
        return print('Deleting user - '.$params[0] . ' - '.$params[1]);
    }


    public function api() {

    }

}

