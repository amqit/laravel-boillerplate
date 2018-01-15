<?php
/**
 * Description: home.php PhpStorm.
 *
 * @package     pusaka-maluku
 * @author      alex
 * @created     30/12/2017, modified: 30/12/2017 01:31
 * @copyright   Copyright (c) 2017.
 */

/**
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
Route::get('/', 'HomeController@index')->name('index');