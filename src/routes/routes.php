<?php

require_once __DIR__.'/router.php';

get('/', UserController::class, 'index');

post('/create', UserController::class, 'recreateUser');

get('/user/$id/create', UserController::class, 'updateUser');

//get('/user/$pid/$id',  UserController::class, 'deleteUser');

get('/product/$id',  ProductController::class, 'index');

get('/api/$id',  UserController::class, 'api');

any('/404', '', '');


