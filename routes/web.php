<?php

/*
 * Frontend Routes
 */
Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
], function () {

    /*
     * Frontend Routes
     * Namespaces indicate folder structure
     */
    Route::group(['namespace' => 'Frontend', 'as' => 'frontend.'], function () {
        include_route_files(__DIR__.'/frontend/');
    });

    /*
     * Backend Routes
     * Namespaces indicate folder structure
     */
    Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.'], function () {
        include_route_files(__DIR__ . '/backend/');
    });

});


Route::group(['prefix' => 'common','as'  => 'common.','namespace' => 'Api'], function () {
    Route::get('get_menu/{type}/{id?}', 'CommonApiController@get_menu');
    Route::get('get_group', 'CommonApiController@get_group');
});