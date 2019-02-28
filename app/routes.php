<?php

Route::get('/', 'HomeController@index');

Route::get('logIn', 'HomeController@login');
Route::get('logout', 'HomeController@logout');

Route::post('logIn', 'HomeController@login');
Route::post('logout', 'HomeController@logout');

Route::post('index', 'HomeController@validate');
Route::get('cuadrillas/{id}', 'CuadrillaController@getCuadrillas');


Route::get('imprimirVenta', 'ClienteController@imprimirVenta');

Route::group(array('prefix' => 'user'), function()
{
    Route::group(array('prefix' => 'melonera'), function()
    {
        Route::get('create' , 'MeloneraController@create' );
        Route::post('create', 'MeloneraController@create' );
        Route::post('edit'  , 'MeloneraController@edit'   );
        Route::get('imprimirMelonera'              , 'MeloneraController@imprimirMelonera'   );
        Route::get('imprimirMeloneraDeudores'      , 'MeloneraController@imprimirMeloneraDeudores'   );
        Route::get('imprimirMeloneraSeleccionada'  , 'MeloneraController@imprimirMeloneraSeleccionada'   );
        Route::get('imprimirDeudoresSeleccionados'  , 'MeloneraController@imprimirDeudoresSeleccionados'   );
    });

    Route::group(array('prefix' => 'cuadrilla'), function()
    {
        Route::get('create' , 'CuadrillaController@create' );
        Route::get('bloquear'  , 'CuadrillaController@bloquear' );
        Route::post('bloquear'  , 'CuadrillaController@bloquear' );
        Route::get('mover'  , 'CuadrillaController@mover' );
        Route::post('mover'  , 'CuadrillaController@mover' );
        Route::post('create', 'CuadrillaController@create' );
        Route::post('edit'  , 'CuadrillaController@edit'   );
    });

    Route::group(array('prefix' => 'cliente'), function()
    {
        Route::get('create' , 'ClienteController@create' );
        Route::get('imprimirCliente' , 'ClienteController@imprimirCliente' );
        Route::post('create', 'ClienteController@create' );
        Route::post('edit'  , 'ClienteController@edit'   );
        Route::post('status', 'ClienteController@status'   );
        Route::post('abonar', 'ClienteController@abonar'   );
        Route::post('vender', 'ClienteController@vender'   );
        Route::post('delete', 'ClienteController@delete'   );
        Route::get('camara' , 'ClienteController@camara'   );
        Route::post('actualizarFoto' , 'ClienteController@actualizarFoto'   );
    });

    Route::group(array('prefix' => 'consultas'), function()
    {
        Route::get('clientes'    , 'ConsultasController@clientes'   );
        Route::get('clienteMovil/{cuadrilla_id}', 'ConsultasController@clientesMovil'   );
        Route::get('meloneras'   , 'ConsultasController@meloneras'   );
        Route::get('cuadrillas'  , 'ConsultasController@cuadrillas'   );
        Route::get('ventas'      , 'ConsultasController@ventas'     );
        Route::get('pagos'       , 'ConsultasController@pagos'      );

        Route::get('clientes_dt_where/{cuadrilla_id}'  ,'ConsultasController@clientes_dt_where'   );
        Route::get('clientes_dt'   , 'ConsultasController@clientes_dt'   );
        Route::get('meloneras_dt'  , 'ConsultasController@meloneras_dt'   );
        Route::get('cuadrillas_dt'  , 'ConsultasController@cuadrillas_dt'   );
        Route::get('ventas_dt'     , 'ConsultasController@ventas_dt'     );
        Route::get('pagos_dt'      , 'ConsultasController@pagos_dt'      );
    });
});

Route::group(array('prefix' => 'admin'), function()
{
    Route::group(array('prefix' => 'reportes'), function()
    {
        Route::get('general', 'ReporteController@general');
        Route::get('VentasPorUsuario', 'ReporteController@VentasPorUsuario');
    });
});

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
        Route::post('profile', 'UserController@edit_profile');
    });

    Route::group(array('prefix' => 'user'), function()
    {
        Route::get('roles', 'RolesController@index');
        Route::get('roles/search', 'RolesController@search');
        Route::post('roles/edit', 'RolesController@edit');
    });
});

Route::get('ventasSinFinalizar',  function(){
  $ventas = DB::connection('bazar')->table('ventas')
  ->select(DB::raw('ventas.id AS id'), DB::raw('sum(precio * cantidad) as total'))
  ->join('detalle_ventas', 'venta_id', '=', 'ventas.id')
  ->whereCajaId(Auth::user()->caja_id)->whereCompleted(0)->get();

  return View::make('cliente.ventasSinFinalizar', compact('ventas'))->render();
});

Route::get('test',  function(){
  /*  $user = User::find(1);
    $user->password = 'admin';
    $user->save();
    */
});
