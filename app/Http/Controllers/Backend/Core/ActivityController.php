<?php
/**
 * Description: ActivityController.php PhpStorm.
 *
 * @package     elnusa_v2
 * @author      alex
 * @created     11/12/2017, modified: 11/12/2017 03:57
 * @copyright   Copyright (c) 2017.
 */

namespace App\Http\Controllers\Backend\Core;


use App\Http\Controllers\Controller;
use App\Models\Core\AuditModel;
use Illuminate\Support\Facades\Lang;
use Yajra\DataTables\Facades\DataTables;

/**
 * @property AuditModel model
 */
class ActivityController extends Controller
{
    /**
     * ActivityController constructor.
     */
    public function __construct()
    {
        $this->middleware(['dashboard', 'clearance']);
        $this->model = new AuditModel();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data['title'] = __('module.logs_title');
        return view('backend.core.audit.index', $data);
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function grid()
    {
        $data = $this->model->join('tb_users', 'tb_logs.user_id', '=', 'tb_users.user_id')
            ->join('tb_groups', 'tb_users.group_id', '=', 'tb_groups.group_id')
            ->whereNotIn('tb_groups.alias', ['superadmin'])
            ->select('tb_logs.*')->get();
        return Datatables::of($data)
            ->editColumn('user', function ($data) {
                return $data->user->fullname;
            })->editColumn('module', function ($data) {
                return $data->module;
            })->editColumn('task', function ($data) {
                return $data->task;
            })->editColumn('ipaddress', function ($data) {
                return $data->ipaddress;
            })->editColumn('note', function ($data) {
                return $data->note;
            })->editColumn('created', function ($data) {
                return date('d/m/Y H:i:s', strtotime($data->created_at));
            })->make(true);

    }
}