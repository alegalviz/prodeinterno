<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

//Route::when('*','detectLang');
$locale = Request::segment(1);

if (in_array($locale, Config::get('app.available_language'))) {
    \App::setLocale($locale);
} else {
    $locale = null;
    \App::setLocale(Config::get('app.locale'));
}
/** ------------------------------------------
 *  Route model binding
 *  ------------------------------------------
 */
Route::model('user', 'User');
Route::model('comment', 'Comment');
Route::model('post', 'Post');
Route::model('role', 'Role');
Route::model('partido', 'Partido');
Route::model('estadio', 'Estadio');
Route::model('equipo', 'Equipo');
Route::model('grupo', 'Grupo');
Route::model('clasificado', 'Clasificado');
Route::model('resultado', 'Resultado');
/** por esto el prode devolvía solamente el ID y no todo el objeto, no esta bindeado */

/** ------------------------------------------
 *  Route constraint patterns
 *  ------------------------------------------
 */
Route::pattern('comment', '[0-9]+');
Route::pattern('post', '[0-9]+');
Route::pattern('user', '[0-9]+');
Route::pattern('role', '[0-9]+');
Route::pattern('token', '[0-9a-z]+');

/** ------------------------------------------
 *  Admin Routes
 *  ------------------------------------------
 */
Route::group(array('prefix' => 'admin', 'before' => 'auth'), function()
{

    # Comment Management
    Route::get('comments/{comment}/edit', 'AdminCommentsController@getEdit');
    Route::post('comments/{comment}/edit', 'AdminCommentsController@postEdit');
    Route::get('comments/{comment}/delete', 'AdminCommentsController@getDelete');
    Route::post('comments/{comment}/delete', 'AdminCommentsController@postDelete');
    Route::controller('comments', 'AdminCommentsController');

    # Blog Management
    # Route::get('blogs/{post}/show', 'AdminBlogsController@getShow');
    # Route::get('blogs/{post}/edit', 'AdminBlogsController@getEdit');
    # Route::post('blogs/{post}/edit', 'AdminBlogsController@postEdit');
     Route::get('blogs/{post}/delete', 'AdminBlogsController@getDelete');
     Route::post('blogs/{post}/delete', 'AdminBlogsController@postDelete');
    # Route::controller('blogs', 'AdminBlogsController');

    # Posts Management
    Route::get('posts/{post}/show', 'AdminPostsController@getShow');
    Route::get('posts/{post}/edit', 'AdminPostsController@getEdit');
    Route::post('posts/{post}/edit', 'AdminPostsController@postEdit');
    Route::get('posts/{post}/delete', 'AdminPostsController@getDelete');
    Route::post('posts/{post}/delete', 'AdminPostsController@postDelete');
    Route::controller('posts', 'AdminPostsController');

    # User Management
    Route::get('users/{user}/show', 'AdminUsersController@getShow');
    Route::get('users/{user}/edit', 'AdminUsersController@getEdit');
    Route::post('users/{user}/edit', 'AdminUsersController@postEdit');
    Route::get('users/{user}/delete', 'AdminUsersController@getDelete');
    Route::post('users/{user}/delete', 'AdminUsersController@postDelete');
    Route::controller('users', 'AdminUsersController');

    # User Role Management
    Route::get('roles/{role}/show', 'AdminRolesController@getShow');
    Route::get('roles/{role}/edit', 'AdminRolesController@getEdit');
    Route::post('roles/{role}/edit', 'AdminRolesController@postEdit');
    Route::get('roles/{role}/delete', 'AdminRolesController@getDelete');
    Route::post('roles/{role}/delete', 'AdminRolesController@postDelete');
    Route::controller('roles', 'AdminRolesController');

    # Prode Management
    Route::get('prodes/{prode}/edit', 'AdminProdesController@getEdit');
    Route::post('prodes/{prode}/edit', 'AdminProdesController@postEdit');
    Route::controller('prodes', 'AdminProdesController');

    # Estadio Management
    Route::get('estadios/{estadio}/edit', 'AdminEstadiosController@getEdit');
    Route::post('estadios/{estadio}/edit', 'AdminEstadiosController@postEdit');
    Route::controller('estadios', 'AdminEstadiosController');

    # Partidos Management
    Route::get('partidos/{partido}/edit', 'AdminPartidosController@getEdit');
    Route::post('partidos/{partido}/edit', 'AdminPartidosController@postEdit');
    Route::controller('partidos', 'AdminPartidosController');

    # Resultados Management
    Route::get('resultados/{resultado}/edit', 'AdminResultadosController@getEdit');
    Route::post('resultados/{resultado}/edit', 'AdminResultadosController@postEdit');
    Route::controller('resultados', 'AdminResultadosController');

    # Admin Dashboard
    Route::controller('/', 'AdminDashboardController');
});


/** ------------------------------------------
 *  Frontend Routes
 *  ------------------------------------------
 */
Route::group(array('prefix' => $locale, 'before' => 'auth'), function()
{
    //:: User Account Routes ::
    Route::post('user/{user}/edit', array('as' => 'postuseredit', 'uses' =>'UserController@postEdit'));
    Route::post('user/post', 'UserController@postPost');
    Route::get('user', array('as' => 'indexuser', 'uses' =>'UserController@getIndex'));
    Route::get('user/{user}','UserController@getUser');

    //:: Application Routes ::

    # Filter for detect language
    //Route::when('contact-us','detectLang');

    # Contact Us Static Page
    Route::get('contact-us', array('as' => 'contact-us', function()
    {
        // Return about us page
        return View::make('site/contact-us');
    }));


    # Partidos
    Route::controller('partidos', 'PartidosController');

    # Partidos
    Route::get('play', 'ProdeController@getPlay');
    Route::get('play/{fecha}',array('as' => 'play', 'uses' => 'ProdeController@getPlay'));
    Route::post('jugarrapido',array('as' => 'jugarrapido', 'uses' => 'ProdeController@postJugarRapido'));

    # Cartelera
    Route::get('cartelera', array('as' => 'getpost', 'uses' => 'PostController@getIndex'));
    Route::get('cartelera/create', 'PostController@getCreate');
    Route::post('cartelera/create', 'PostController@postCreate');
    Route::post('cartelera/{id}/like', 'PostController@postLike');
    Route::post('cartelera/{id}/comment', 'PostController@postComment');

    #Posiciones
    Route::get('posiciones', array('as' => 'getposiciones', 'uses' => 'PuntajesController@getPosiciones'));

    # Index Page - Last route, no matches
    Route::get('/', array('as' => 'front', 'before' => 'auth','uses' => 'ProdeController@getIndex'));
});

# Rutas sin login
Route::group(array('prefix' => $locale), function()
{
    //:: User Account Routes ::
    Route::post('user/login', array('as' => 'login', 'uses' => 'UserController@postLogin'));

    //:: User Account Routes ::
    Route::get('user/create', array('as' => 'getcreate', 'uses' => 'UserController@getCreate'));
    // User reset routes
    Route::get('user/reset/{token}', array('as' => 'getreset', 'uses' => 'UserController@getReset'));
    // User password reset
    Route::post('user/reset/{token}', array('as' => 'postreset', 'uses' => 'UserController@postReset'));


    # User RESTful Routes (Login, Logout, Register, etc)
    Route::controller('user', 'UserController');

});