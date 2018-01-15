<?php
/**
 * Description: modules.php PhpStorm.
 *
 * @package     pusaka-maluku
 * @author      alex
 * @created     03/01/2018, modified: 03/01/2018 23:51
 * @copyright   Copyright (c) 2018.
 */

Route::group(['middleware' => 'dashboard'], function () {
    Route::group([
        'prefix' => 'post',
        'as'  => 'post.',
        'namespace' => 'Modules\Posts'], function() {
        Route::resource('category', 'CategoryController');
        Route::resource('tags', 'TagsController');

        Route::group([
            'prefix' => 'articles',
            'as'  => 'articles.'], function() {
            Route::resource('/', 'ArticlesController');
            Route::get('cart', ['as' => 'cart', 'uses' => 'ArticlesController@cart']);
            Route::get('review', ['as' => 'review', 'uses' => 'ArticlesController@review']);

        });
    });
});