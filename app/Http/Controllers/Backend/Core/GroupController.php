<?php
/**
 * Description: GroupController.php PhpStorm.
 *
 * @package     elnusa_v2
 * @author      alex
 * @created     03/12/2017, modified: 03/12/2017 19:16
 * @copyright   Copyright (c) 2017.
 */

namespace App\Http\Controllers\Backend\Core;


use App\Http\Controllers\Controller;
use App\Libraries\AppHelpers;
use App\Models\Core\AccessModel;
use App\Models\Core\GroupsModel;
use App\Models\Core\MenuModel;
use App\Models\Core\UsersModel;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Validator;
use Yajra\DataTables\Facades\DataTables;

/**
 * @property GroupsModel model
 * @property UsersModel users
 */
class GroupController extends Controller
{
    private $url = 'admin/system/groups';

    /**
     * GroupController constructor.
     */
    public function __construct()
    {
        $this->middleware(['dashboard', 'clearance']);
        $this->model = new GroupsModel();
        $this->users = new UsersModel();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data['title'] = __('common.list') . ' ' . __('module.group');
        return view('backend.core.groups.index', $data);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        AppHelpers::permission('is_create', 'admin.system.groups', false, 'module');
        $data['title'] = __('common.add') . ' ' . __('module.group');
        return view('backend.core.groups.form', $data);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function update($id)
    {
        AppHelpers::permission('is_update', 'admin.system.groups', false, 'module');
        $key = AppHelpers::decode_id($id);
        $data = $this->model->findOrFail($key);
        $data['title'] = __('common.edit') . ' ' . __('module.group');
        $data['secure_id'] = $id;
        return view('backend.core.groups.form', $data);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function access($id)
    {
        AppHelpers::permission('is_update', 'admin.system.groups', false, 'module');
        $key = AppHelpers::decode_id($id);
        $data = $this->model->findOrFail($key);
        $data['id'] = $id;
        $data['menu'] = MenuController::getMenu($key);
        $data['title'] = sprintf(__('module.access_title'), $data->name);
        return view('backend.core.groups.access', $data);
    }

    /**
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $data = $request->all();
        if ($data) {
            $key = AppHelpers::decode_id($data['secure_id']);
            Validator::make($data, [
                'name' => 'required|'.Rule::unique('tb_groups')->ignore($key, 'group_id')
            ],[
                'name.required' => sprintf(__('validation.required'), __('forms.group_name')),
                'name.unique' => sprintf(__('validation.unique'), __('forms.group_name')),
            ])->validate();

            if (!$data['secure_id']) {
                AppHelpers::permission('is_create', 'admin.system.groups', false, 'module');
                $result = $this->model;
                $result->name = $data['name'];
                $result->description = $data['description'];
                $result->alias = str_slug($data['name']);
                if ($result->save()) {
                    AppHelpers::auditTrail($request, sprintf(__('common.log_add'), $result->group_id));
                    return redirect($this->url)->with('message', __('common.success_save'))
                        ->with('type', 'success');
                } else {
                    return redirect($this->url . '/create')->with('message', __('common.failed_save'))
                        ->with('type', 'error')->withInput();
                }
            } else {
                AppHelpers::permission('is_update', 'admin.system.groups', false, 'module');
                $result = $this->model->find($key);
                $result->name = $data['name'];
                $result->description = $data['description'];
                $result->alias = str_slug($data['name']);
                if ($result->save()) {
                    AppHelpers::auditTrail($request, sprintf(__('common.log_edit'), $result->group_id));
                    return redirect($this->url)->with('message', __('common.success_update'))
                        ->with('type', 'success');
                } else {
                    return redirect($this->url . '/update/' . $data['secure_id'])->with('message', __('common.failed_update'))
                        ->with('type', 'error')->withInput();
                }
            }
        } else {
            return redirect($this->url)->with('message', __('common.no_request'))
                ->with('type', 'error')->withInput();
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function save_permission(Request $request)
    {
        AppHelpers::permission('is_update', 'admin.system.groups', false, 'module');
        $id = AppHelpers::decode_id($request->group_id);
        $_read = [];
        if ($request->is_read) {
            foreach ($request->is_read as $val) {
                $_read[] = array('menu_id' => $val);
            }
        }

        $_create = [];
        if ($request->is_create) {
            foreach ($request->is_create as $val) {
                $_create[] = array('menu_id' => $val);
            }
        }

        $_update = [];
        if ($request->is_update) {
            foreach ($request->is_update as $val) {
                $_update[] = array('menu_id' => $val);
            }
        }

        $_delete = [];
        if ($request->is_delete) {
            foreach ($request->is_delete as $val) {
                $_delete[] = array('menu_id' => $val);
            }
        }

        $_approve = [];
        if ($request->is_approve) {
            foreach ($request->is_approve as $val) {
                $_approve[] = array('menu_id' => $val);
            }
        }

        $merged = array_merge($_read, $_create, $_update, $_delete, $_approve);
        $result = [];
        foreach ($merged as $key => $data) {
            $access = AppHelpers::trimId($data['menu_id']);
            $module = MenuModel::find($access[1]);
            if (isset($result[$access[1]])) {
                $result[$access[1]][$access[0]] = 1;
            } else {
                $result[$access[1]] = array('menu_id' => intval($access[1]), $access[0] => 1, 'group_id' => intval($id), 'module' => $module->module);
            }
        }
        if ($merged) {
            $current = AccessModel::where('group_id', '=', intval($id));
            $insert = null;
            if ($current->count() > 0) {
                $deletedRows = AccessModel::where('group_id', '=', intval($id))->delete();
                if ($deletedRows) {
                    foreach ($result as $val) {
                        $insert = AccessModel::insert($val);
                    }
                }
            } else {
                foreach ($result as $val) {
                    $insert = AccessModel::insert($val);
                }
            }

            if ($insert) {
                AppHelpers::auditTrail($request, sprintf(__('common.log_edit'), $insert));
                return redirect($this->url)->with('message', __('common.success_update'))
                    ->with('type', 'success');
            } else {
                return redirect($this->url . '/access/' . $request->group_id)->with('message', __('common.failed_update'))
                    ->with('type', 'error');
            }
        } else {
            $current = AccessModel::where('group_id', '=', intval($id));
            if ($current->count() > 0) {
                AccessModel::where('group_id', '=', intval($id))->delete();
                return redirect($this->url)->with('message', __('common.success_update'))
                    ->with('type', 'success');
            } else {
                return redirect($this->url . '/access/' . $request->group_id)->with('message', __('module.access_empty'))
                    ->with('type', 'warning');

            }
        }
    }

    /**
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        AppHelpers::permission('is_delete', 'admin.system.groups', false, 'module');
        if (!empty($request->secure_id)) {
            $id = AppHelpers::decode_id($request->secure_id);
        } else {
            return redirect($this->url)->with('message', __('common.no_request'))
                ->with('type', 'error');
        }

        $data = $this->model->find($id);
        if ($data) {
            $child = $this->users->where('group_id', $id)->count();
            if ($child > 0) {
                return redirect($this->url)->with('message', 'Failed to delete this group. ' . $child . ' user(s) assigned.')
                    ->with('type', 'error');
            }
            if ($data->delete()) {
                AppHelpers::auditTrail($request, sprintf(__('common.log_delete'), $id));
                return redirect($this->url)->with('message', __('common.success_delete'))
                    ->with('type', 'success');
            } else {
                return redirect($this->url)->with('message', __('common.failed_delete'))
                    ->with('type', 'error');
            }
        } else {
            return redirect($this->url)->with('message', __('common.not_found'))
                ->with('type', 'error');
        }
    }

    /**
     * @return mixed
     * @throws Exception
     */
    public function grid()
    {
        $data = $this->model->whereNotIn('alias', ['superadmin'])->get();
        return Datatables::of($data)
            ->editColumn('name', function ($data) {
                return $data->name;
            })->editColumn('description', function ($data) {
                return $data->description;
            })->editColumn('alias', function ($data) {
                return $data->alias;
            })->addColumn('action', function ($data) {
                $id = AppHelpers::encode_id($data->group_id);
                $buttons = '';
                if (AppHelpers::access('is_update', 'admin.system.groups')):
                    $buttons .= '<a href="' . route('admin.system.groups.update', ['update' => $id]) . '" type="button" class="btn btn-xs btn-default"><span class="fa fa-pencil"></span></a>';
                    $buttons .= '<a href="' . route('admin.system.groups.access', ['access' => $id]) . '" type="button" class="btn btn-xs btn-primary"><span class="fa fa-key"></span></a>';
                endif;
                if (AppHelpers::access('is_delete', 'admin.system.groups')):
                    $buttons .= '<button type="button" class="btn btn-xs btn-danger mb-control" onclick="appRemove(\'' . $id . '\',\'' . $data->name . '\')"><span class="fa fa-trash-o"></span></button>';
                endif;
                return $buttons;
            })->make(true);
    }
}