<?php
/**
 * Description: admin.php PhpStorm.
 *
 * @package     pusaka-maluku
 * @author      alex
 * @created     30/12/2017, modified: 30/12/2017 01:30
 * @copyright   Copyright (c) 2017.
 */

Auth::routes();
Route::group(['middleware' => 'dashboard'], function () {
    Route::get('/', 'DashboardController@index')->name('dashboard');

    Route::group([
        'prefix' => 'system',
        'as'  => 'system.',
        'namespace' => 'Core'], function() {
        Route::group([
            'prefix' => 'menus',
            'as'  => 'menus.'], function() {
            Route::get('/', ['as' => 'index', 'uses' => 'MenuController@index']);
            Route::get('create', ['as' => 'create', 'uses' => 'MenuController@create']);
            Route::get('update/{id}', ['as' => 'update', 'uses' => 'MenuController@update']);
            Route::post('store', ['as' => 'store', 'uses' => 'MenuController@store']);
            Route::post('destroy', ['as' => 'destroy', 'uses' => 'MenuController@destroy']);
            Route::post('reposition', ['as' => 'reposition', 'uses' => 'MenuController@reorderMenu']);
            Route::get('grid', ['as' => 'grid', 'uses' => 'MenuController@grid']);

            Route::get('group', ['as' => 'group', 'uses' => 'MenuController@group']);
            Route::get('group_grid', ['as' => 'group_grid', 'uses' => 'MenuController@group_grid']);
            Route::get('group_create', ['as' => 'group_create', 'uses' => 'MenuController@group_create']);
            Route::get('group_update/{id}', ['as' => 'group_update', 'uses' => 'MenuController@group_update']);
            Route::post('group_store', ['as' => 'group_store', 'uses' => 'MenuController@group_store']);
            Route::post('group_destroy', ['as' => 'group_destroy', 'uses' => 'MenuController@group_destroy']);
        });

        Route::group([
            'prefix' => 'groups',
            'as'  => 'groups.'], function() {
            Route::get('/', ['as' => 'index', 'uses' => 'GroupController@index']);
            Route::get('create', ['as' => 'create', 'uses' => 'GroupController@create']);
            Route::get('update/{id}', ['as' => 'update', 'uses' => 'GroupController@update']);
            Route::get('access/{id}', ['as' => 'access', 'uses' => 'GroupController@access']);
            Route::post('store', ['as' => 'store', 'uses' => 'GroupController@store']);
            Route::post('permission', ['as' => 'permission', 'uses' => 'GroupController@save_permission']);
            Route::post('destroy', ['as' => 'destroy', 'uses' => 'GroupController@destroy']);
            Route::get('grid', ['as' => 'grid', 'uses' => 'GroupController@grid']);
        });

        Route::group([
            'prefix' => 'users',
            'as'  => 'users.'], function() {
            Route::get('/', ['as' => 'index', 'uses' => 'UserController@index']);
            Route::get('create', ['as' => 'create', 'uses' => 'UserController@create']);
            Route::get('update/{id}', ['as' => 'update', 'uses' => 'UserController@update']);
            Route::get('show/{id}', ['as' => 'show', 'uses' => 'UserController@show']);
            Route::post('store', ['as' => 'store', 'uses' => 'UserController@store']);
            Route::post('destroy', ['as' => 'destroy', 'uses' => 'UserController@destroy']);
            Route::get('grid', ['as' => 'grid', 'uses' => 'UserController@grid']);
        });

        Route::group([
            'prefix' => 'logs',
            'as'  => 'logs.'], function() {
            Route::get('/', ['as' => 'index', 'uses' => 'ActivityController@index']);
            Route::post('destroy', ['as' => 'destroy', 'uses' => 'ActivityController@destroy']);
            Route::get('grid', ['as' => 'grid.', 'uses' => 'ActivityController@grid']);
        });

        Route::group([
            'prefix' => 'configuration',
            'as'  => 'configuration.'], function() {
            Route::get('/', ['as' => 'index', 'uses' => 'ConfigController@index']);
            Route::post('store', ['as' => 'store', 'uses' => 'ConfigController@store']);
        });
    });
});