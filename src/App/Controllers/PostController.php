<?php
use Carbon\Carbon;
use Respect\Validation\Validator as validate;

class PostController extends Controller
{
    public function index () {
        $post = Post::find(2);
        return print json_encode(['title' => $post->title, 'description' => $post->description, 'author'=> $post->author]);
    }
}