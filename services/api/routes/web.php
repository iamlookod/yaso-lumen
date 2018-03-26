<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/', function () use ($app) {
    return $app->version();
});

$app->get('/key',function () use ($app) {
    $key = str_random(32);
    return $key;
});
// login
$app->post('/login/post','LoginController@postLogin');
// member
$app->post('/member/data','MemberController@postData');
$app->post('/member/changepassword','MemberController@postPassword');