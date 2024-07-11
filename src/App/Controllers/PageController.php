<?php
use Carbon\Carbon;
use Respect\Validation\Validator as validate;

class PageController extends Controller
{
    public function index($params) {
        return View::render('pages/index', 
            [
                "title" => "Little? We're bigger than that!"
            ]
        );
    }

    public function projects($params) {
        return View::render('pages/projects', 
            [
                'title' => 'Our Teck-Stack'
            ]
        );
    }

}

