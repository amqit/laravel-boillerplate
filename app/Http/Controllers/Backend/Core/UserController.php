<?php
/**
 * Description: UserController.php PhpStorm.
 *
 * @package     elnusa_v2
 * @author      alex
 * @created     03/12/2017, modified: 03/12/2017 19:17
 * @copyright   Copyright (c) 2017.
 */

namespace App\Http\Controllers\Backend\Core;


use App\Http\Controllers\Api\CommonApiController;
use App\Http\Controllers\Controller;
use App\Libraries\AppHelpers;
use App\Models\Core\GroupsModel;
use App\Models\Core\UsersModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Validator;
use Yajra\DataTables\Facades\DataTables;

/**
 * @property UsersModel model
 * @property GroupsModel group
 * @property CommonApiController api
 */
class UserController extends Controller
{
    private $url = 'admin/system/users';

    /**
     * UserController constructor.
     */
    public function __construct()
    {
        $this->middleware(['dashboard', 'clearance']);
        $this->model = new UsersModel();
        $this->group = new GroupsModel();
        $this->api = new CommonApiController();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        AppHelpers::permission('is_read', 'admin.system.users', false, 'module');
        $data['title'] = __('common.list') . ' ' . __('module.user');
        return view('backend.core.users.index', $data);
    }

    /**
     * @param null $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function update($id)
    {
        AppHelpers::permission('is_update', 'admin.system.users', false, 'module');
        $key = AppHelpers::decode_id($id);
        $data = $this->model->findOrFail($key);
        $data['secure_id'] = $id;
        $data['title'] = __('common.edit') . ' ' . __('module.user');
        return view('backend.core.users.form', $data);
    }

    /**
     * @param null $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        AppHelpers::permission('is_update', 'admin.system.users', false, 'module');
        $key = AppHelpers::decode_id($id);
        $user = $this->model->findOrFail($key);
        $data['user'] = $user;
        $data['title'] = __('forms.user_profile') . ' ' . __('module.user');
        return view('backend.core.users.view', $data);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        AppHelpers::permission('is_create', 'admin.system.users', false, 'module');
        $data['secure_id'] = null;
        $data['title'] = __('common.add') . ' ' . __('module.user');
        return view('backend.core.users.form', $data);
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
                'fullname' => 'required',
                'username' => 'required|min:5|max:15|' . Rule::unique('tb_users')->ignore($key, 'user_id'),
                'email' => 'required|' . Rule::unique('tb_users')->ignore($key, 'user_id'),
                'group_id' => 'required'
            ],[
                'fullname.required' => sprintf(__('validation.required'), __('forms.user_fullname')),
                'username.required' => sprintf(__('validation.required'), __('auth.username')),
                'email.required' => sprintf(__('validation.required'), __('text.email')),
                'group_id.required' => sprintf(__('validation.required'), __('module.group')),
                'username.unique' => sprintf(__('validation.unique'), __('auth.username')),
                'email.unique' => sprintf(__('validation.unique'), __('text.email'))
            ])->validate();

            if ($request->password) {
                Validator::make($data, [
                    'password' => 'required|confirmed|min:5|max:15',
                    'password_confirmation' => 'required|min:5|max:15',
                ])->validate();
            }

            $to_insert = array(
                "fullname" => $data['fullname'],
                "username" => $data['username'],
                "email" => $data['email'],
                "group_id" => $data['group_id'],
                "active" => $data['active']
            );
            if (!$data['secure_id']) {
                AppHelpers::permission('is_create', 'admin.system.users', false, 'module');
                $to_insert['password'] = Hash::make($data['password']);
                $to_insert['created_at'] = Carbon::now();
                $result = $this->model->insert($to_insert);
                if ($result) {
                    AppHelpers::auditTrail($request, sprintf(__('common.log_add'), $result));
                    return redirect($this->url)->with('message', __('common.success_save'))
                        ->with('type', 'success');
                } else {
                    return redirect($this->url . '/create')->with('message', __('common.failed_save'))
                        ->with('type', 'error')->withInput();
                }
            } else {
                AppHelpers::permission('is_update', 'admin.system.users', false, 'module');
                if ($data['password']) {
                    $to_insert['password'] = Hash::make($data['password']);
                }
                $to_insert['updated_at'] = Carbon::now();
                $result = $this->model->find($key)->update($to_insert);
                if ($result) {
                    if (session('user_id') == $key) {
                        $user = $this->model->find($key);
                        $session = array(
                            'fullname' => $user->fullname,
                            'email' => $user->email,
                            'group' => $user->group_id,
                            'group_name' => $user->group->name,
                            'alias' => $user->group->alias
                        );
                        session($session);
                    }
                    AppHelpers::auditTrail($request, sprintf(__('common.log_edit'), $result));
                    return redirect($this->url)->with('message', __('common.success_update'))
                        ->with('type', 'success');
                } else {
                    return redirect($this->url . '/update/' . $data['secure_id'])->with('message', __('common.failed_update'))
                        ->with('type', 'error')->withInput();
                }
            }
        } else {
            return redirect($this->url)->with('message', __('common.no_request'))
                ->with('type', 'error');
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        AppHelpers::permission('is_delete', 'admin.system.users', false, 'module');
        if (!empty($request->secure_id)) {
            $id = AppHelpers::decode_id($request->secure_id);
        } else {
            return redirect($this->url)->with('message', __('common.no_request'))
                ->with('type', 'error');
        }

        $data = $this->model->find($id);
        if ($data) {
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
     * @throws \Exception
     */
    public function grid()
    {
        $data = $this->model->whereNotIn('group_id', [1])->get();
        return Datatables::of($data)
            ->editColumn('fullname', function ($data) {
                return $data->fullname;
            })->editColumn('email', function ($data) {
                return $data->email;
            })->editColumn('group', function ($data) {
                return $data->group->name;
            })->editColumn('last_login', function ($data) {
                return $data->last_login;
            })->editColumn('active', function ($data) {
                return AppHelpers::getActive($data->active);
            })->addColumn('action', function ($data) {
                $id = AppHelpers::encode_id($data->user_id);
                $buttons = '<a href="' . route('admin.system.users.show', ['show' => $id]) . '" type="button" class="btn btn-xs btn-info"><span class="fa fa-eye"></span></a>';
                if (AppHelpers::access('is_update', 'admin.system.users')):
                    $buttons .= '<a href="' . route('admin.system.users.update', ['update' => $id]) . '" type="button" class="btn btn-xs btn-default"><span class="fa fa-pencil"></span></a>';
                endif;
                if (AppHelpers::access('is_delete', 'admin.system.users')):
                    $buttons .= '<button type="button" class="btn btn-xs btn-danger mb-control" onclick="appRemove(\'' . $id . '\',\'' . $data->fullname . '\')"><span class="fa fa-trash-o"></span></button>';
                endif;
                return $buttons;
            })->rawColumns(['active', 'action'])->make(true);
    }
}