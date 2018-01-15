<?php
/**
 * Description: ConfigController.php PhpStorm.
 *
 * @package     elnusa_v2
 * @author      alex
 * @created     21/12/2017, modified: 21/12/2017 02:49
 * @copyright   Copyright (c) 2017.
 */

namespace App\Http\Controllers\Backend\Core;


use App\Http\Controllers\Controller;
use App\Libraries\AppHelpers;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Request;
use Symfony\Component\HttpFoundation\File\Exception\FileNotFoundException;

/**
 * Class       ConfigController
 * @package App\Http\Controllers\Core
 * $
 * @author Alex Gaspersz
 * @created 18/12/2017
 */
class ConfigController extends Controller
{
    /**
     * ConfigController constructor.
     */
    public function __construct()
    {
        $this->middleware(['dashboard','clearance','isAdmin']);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        AppHelpers::permission('is_create', 'setting.system.configuration', false, 'module');
        try {
            $contents = File::get(base_path('.appconf'));
            $data['conf'] = $contents;
            $data['title'] = __('module.config_title_desc');

            return view('backend.core.config.index',$data);

        } catch (FileNotFoundException $exception) {
            die("The file doesn't exist");
        }
    }

    /**
     * @param Request $request
     */
    public function store(Request $request)
    {
//
    }
}