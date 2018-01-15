<?php
/**
 * Description: HomeController.php PhpStorm.
 *
 * @package     pusaka-maluku
 * @author      alex
 * @created     28/12/2017, modified: 28/12/2017 01:57
 * @copyright   Copyright (c) 2017.
 */

namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data['title'] = 'Home';
        return view('frontend.official.welcome',$data);
    }
}