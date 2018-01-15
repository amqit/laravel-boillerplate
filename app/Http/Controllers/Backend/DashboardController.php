<?php
/**
 * Description: DashboardController.php PhpStorm.
 *
 * @package     pusaka-maluku
 * @author      alex
 * @created     28/12/2017, modified: 28/12/2017 01:48
 * @copyright   Copyright (c) 2017.
 */

namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Dashboard constructor.
     */
    public function __construct(){
        $this->middleware(['dashboard','clearance']);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data['title'] = __('module.dashboard');
        return view('backend.dashboard', $data);
    }
}