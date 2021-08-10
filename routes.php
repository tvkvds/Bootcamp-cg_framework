<?php

/** --------------------------------------------------------------------------------------------------------
 * Add your routes here.
 * At this point, variables in a route are not supported like in Laravel: user/{user_id}/edit
 *  I add this in a future version.
 * 
 * Protect your routes with one ore more Middleware classes, like WhenNotLoggedIn or Permissions.
 *  See the classes for more information.
 * Add Middleware in an associative array with a key, like the admin route
 * ---------------------------------------------------------------------------------------------------------
*/

use App\Middleware\WhenNotLoggedin;
use App\Middleware\Permissions;

//make different files for different route groups, require those in here?

$router->get('admin', 'App/Controllers/AdminController.php@index', [
    'auth' => WhenNotLoggedin::class,
]);

//
// ---   user routes
//

$router->get('user/{id}', 'App/Controllers/UserController.php@show', [
    'show' => Permissions::class
]);

$router->get('user/{id}/cv', 'App/Controllers/UserController.php@cv',[
    'cv' => WhenNotLoggedin::class
]);

$router->get('user/{id}/edit', 'App/Controllers/UserController.php@edit', [
    'edit' => Permissions::class
]);

$router->get('users', 'App/Controllers/UserController.php@index', [
    'index' => Permissions::class
]);

$router->get('user/create', 'App/Controllers/UserController.php@create');

$router->post('user/{id}/update', 'App/Controllers/UserController.php@update', [
    'update' => Permissions::class
]);

$router->post('user/store', 'App/Controllers/UserController.php@store', [
    'store' => Permissions::class
]);

$router->post('user/{id}/destroy', 'App/Controllers/UserController.php@update', [
    'update' => Permissions::class
]);

//
// ---   education routes
//

$router->get('education', 'App/Controllers/EducationController.php@index', [
    'index' => Permissions::class
]);

$router->get('education/{id}', 'App/Controllers/EducationController.php@show', [
    'show' => Permissions::class
]);


$router->get('education/{id}/create', 'App/Controllers/EducationController.php@create', [
    'edit' => Permissions::class
]);

$router->post('education/store', 'App/Controllers/EducationController.php@store', [
    'store' => Permissions::class
]);

$router->get('education/{id}/edit', 'App/Controllers/EducationController.php@edit', [
    'edit' => Permissions::class
]);

$router->post('education/{id}/update', 'App/Controllers/EducationController.php@update', [
    'update' => Permissions::class
]);

$router->get('education/{id}/destroy', 'App/Controllers/EducationController.php@destroy', [
    'destroy' => Permissions::class
]);

//
// ---   job routes
//

$router->get('job', 'App/Controllers/JobController.php@index', [
    'index' => Permissions::class
]);

$router->get('job/{id}', 'App/Controllers/JobController.php@show', [
    'show' => Permissions::class
]);

$router->get('job/{id}/edit', 'App/Controllers/JobController.php@edit', [
    'edit' => Permissions::class
]);

$router->post('job/{id}/update', 'App/Controllers/JobController.php@update', [
    'update' => Permissions::class
]);

$router->get('job/{id}/create', 'App/Controllers/JobController.php@create', [
    'edit' => Permissions::class
]);

$router->post('job/store', 'App/Controllers/JobController.php@store', [
    'store' => Permissions::class
]);

$router->get('job/{id}/destroy', 'App/Controllers/JobController.php@destroy', [
    'destroy' => Permissions::class
]);

//
// ---   skill routes
//

$router->get('skill', 'App/Controllers/SkillController.php@index', [
    'index' => Permissions::class
]);

$router->get('skill/{id}', 'App/Controllers/SkillController.php@show', [
    'show' => Permissions::class
]);

$router->get('skill/{id}/edit', 'App/Controllers/SkillController.php@edit', [
    'edit' => Permissions::class
]);

$router->post('skill/{id}/update', 'App/Controllers/SkillController.php@update', [
    'update' => Permissions::class
]);

$router->get('skill/{id}/create', 'App/Controllers/SkillController.php@create', [
    'edit' => Permissions::class
]);

$router->post('skill/store', 'App/Controllers/SkillController.php@store', [
    'store' => Permissions::class
]);

$router->get('skill/{id}/destroy', 'App/Controllers/SkillController.php@destroy', [
    'destroy' => Permissions::class
]);

//
// ---   hobby routes
//

$router->get('hobby', 'App/Controllers/HobbyController.php@index', [
    'index' => Permissions::class
]);

$router->get('hobby/{id}', 'App/Controllers/HobbyController.php@show', [
    'show' => Permissions::class
]);

$router->get('hobby/{id}/edit', 'App/Controllers/HobbyController.php@edit', [
    'edit' => Permissions::class
]);

$router->post('hobby/{id}/update', 'App/Controllers/HobbyController.php@update', [
    'update' => Permissions::class
]);

$router->get('hobby/{id}/create', 'App/Controllers/HobbyController.php@create', [
    'edit' => Permissions::class
]);

$router->post('hobby/store', 'App/Controllers/HobbyController.php@store', [
    'store' => Permissions::class
]);

$router->get('hobby/{id}/destroy', 'App/Controllers/HobbyController.php@destroy', [
    'destroy' => Permissions::class
]);

//
// ---   project routes
//

$router->get('project', 'App/Controllers/ProjectController.php@index', [
    'index' => Permissions::class
]);

$router->get('project/{id}', 'App/Controllers/ProjectController.php@show', [
    'show' => Permissions::class
]);

$router->get('project/{id}/edit', 'App/Controllers/ProjectController.php@edit', [
    'edit' => Permissions::class
]);

$router->post('project/{id}/update', 'App/Controllers/ProjectController.php@update', [
    'update' => Permissions::class
]);

$router->get('project/{id}/create', 'App/Controllers/ProjectController.php@create', [
    'edit' => Permissions::class
]);

$router->post('project/store', 'App/Controllers/ProjectController.php@store', [
    'store' => Permissions::class
]);

$router->get('project/{id}/destroy', 'App/Controllers/ProjectController.php@destroy', [
    'destroy' => Permissions::class
]);





//
//other routes
//

$router->get('me', 'App/Controllers/ProfileController.php@index');

$router->get('', 'App/Controllers/HomeController.php@index');
$router->get('home', 'App/Controllers/HomeController.php');

$router->get('login', 'App/Controllers/LoginController.php@index');
$router->get('logout', 'App/Controllers/LoginController.php@logout');
$router->post('login/auth', 'App/Controllers/LoginController.php@login');

$router->get('contact', 'App/Controllers/ContactController.php@index');

$router->get('register', 'App/Controllers/RegisterController.php@index');
$router->post('register', 'App/Controllers/RegisterController.php@store');