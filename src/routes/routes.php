<?php

require_once __DIR__.'/router.php';

get('/', PageController::class, 'index');
get('/our-work', PageController::class, 'projects');

post('/create', UserController::class, 'recreateUser');

get('/api/posts', PostController::class, 'index');

get('/user/$id/create', UserController::class, 'updateUser');

//get('/user/$pid/$id',  UserController::class, 'deleteUser');

get('/product/$id',  ProductController::class, 'index');

get('/api/$id',  UserController::class, 'api');

any('/404', '', '');




