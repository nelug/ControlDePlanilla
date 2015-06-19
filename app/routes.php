<?php

User::observe(new \NEkman\ModelLogger\Observer\Logger);
Producto::observe(new \NEkman\ModelLogger\Observer\Logger);

Route::get('/', 'HomeController@index');
Route::get('logIn', 'HomeController@login');
Route::get('logout', 'HomeController@logout');
Route::post('index', 'HomeController@validate');

Route::group(array('prefix' => 'user'), function()
{
    Route::group(array('prefix' => 'melonera'), function()
    {
        Route::get('create' , 'MeloneraController@create' );
        Route::post('create', 'MeloneraController@create' );
        Route::post('edit'  , 'MeloneraController@edit'   );
    });

    Route::group(array('prefix' => 'cuadrilla'), function()
    {
        Route::get('create' , 'CuadrillaController@create' );
        Route::post('create', 'CuadrillaController@create' );
        Route::post('edit'  , 'CuadrillaController@edit'   );
    });

    Route::group(array('prefix' => 'cliente'), function()
    {
        Route::get('create' , 'ClienteController@create' );
        Route::post('create', 'ClienteController@create' );
        Route::post('edit'  , 'ClienteController@edit'   );
        Route::get('camara'  , 'ClienteController@camara'   );
    });

} );

Route::group(array('prefix' => 'owner'), function()
{
    Route::get('users', 'UserController@index');
    Route::get('users_list', 'UserController@users_list');

    Route::group(array('prefix' => 'user'), function()
    {
        Route::get('create', 'UserController@create');
        Route::post('create', 'UserController@create');
        Route::post('edit', 'UserController@edit');
        Route::post('remove_role', 'UserController@remove_role');
        Route::post('add_role', 'UserController@add_role');
        Route::post('delete', 'UserController@delete');
        Route::get('profile', 'UserController@edit_profile');
    });

    Route::group(array('prefix' => 'user'), function()
    {
        Route::get('roles', 'RolesController@index');
        Route::get('roles/search', 'RolesController@search');
        Route::post('roles/edit', 'RolesController@edit');
    });

});
