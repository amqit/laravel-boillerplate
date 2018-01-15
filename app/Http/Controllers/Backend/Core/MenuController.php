<?php
/**
 * Description: MenuController.php PhpStorm.
 *
 * @package     elnusa_v2
 * @author      alex
 * @created     03/12/2017, modified: 03/12/2017 19:17
 * @copyright   Copyright (c) 2017.
 */

namespace App\Http\Controllers\Backend\Core;


use App\Http\Controllers\Controller;
use App\Libraries\AppHelpers;
use App\Models\Core\AccessModel;
use App\Models\Core\MenuGroupModel;
use App\Models\Core\MenuModel;
use App\Models\Core\MenuTranslationModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Mcamara\LaravelLocalization\LaravelLocalization;
use Validator;
use Yajra\DataTables\Facades\DataTables;

/**
 * @property MenuModel model
 * @property AccessModel access
 * @property Route route
 * @property MenuTranslationModel translation
 * @property LaravelLocalization locale
 * @property MenuGroupModel group
 */
class MenuController extends Controller
{
    private $url = 'admin/system/menus';

    /**
     * MenuController constructor.
     */
    public function __construct()
    {
        $this->middleware(['dashboard', 'clearance', 'isAdmin']);
        $this->model = new MenuModel();
        $this->group = new MenuGroupModel();
        $this->translation = new MenuTranslationModel();
        $this->access = new AccessModel();
        $this->route = Route::currentRouteName();
        $this->locale = new LaravelLocalization();
    }

    /**
     * @param $id
     * @return array
     */
    public static function getMenu($id)
    {
        $menu = new MenuModel();
        $parent = $menu->getMenuByParent(0);
        $_parent = [];
        foreach ($parent as $row) {
            $lev1 = $menu->getMenuByParent($row->menu_id);
            $_lev1 = [];
            foreach ($lev1 as $l1) {
                $lev2 = $menu->getMenuByParent($l1->menu_id);
                $_lev2 = [];
                foreach ($lev2 as $l2) {
                    $lev3 = $menu->getMenuByParent($l2->menu_id);
                    $_lev3 = [];
                    foreach ($lev3 as $l3) {
                        $lev4 = $menu->getMenuByParent($l3->menu_id);
                        $_lev4 = [];
                        foreach ($lev4 as $l4) {
                            $lev4Access = AccessModel::where('group_id', '=', $id)->where('menu_id', '=', $l4->menu_id)->first();
                            $_lev4[] = array(
                                'id' => $l4->menu_id,
                                'menu_name' => $l4->menu_title,
                                'ordering' => $l4->ordering,
                                'checked' => array(
                                    "is_create" => $lev4Access ? $lev4Access->is_create : 0,
                                    "is_read" => $lev4Access ? $lev4Access->is_read : 0,
                                    "is_update" => $lev4Access ? $lev4Access->is_update : 0,
                                    "is_delete" => $lev4Access ? $lev4Access->is_delete : 0,
                                    "is_approve" => $lev4Access ? $lev4Access->is_approve : 0,
                                )
                            );
                        }
                        $lev3Access = AccessModel::where('group_id', '=', $id)->where('menu_id', '=', $l3->menu_id)->first();
                        $_lev3[] = array(
                            'id' => $l3->menu_id,
                            'menu_name' => $l3->menu_title,
                            'ordering' => $l3->ordering,
                            'level4' => $_lev4,
                            'checked' => array(
                                "is_create" => $lev3Access ? $lev3Access->is_create : 0,
                                "is_read" => $lev3Access ? $lev3Access->is_read : 0,
                                "is_update" => $lev3Access ? $lev3Access->is_update : 0,
                                "is_delete" => $lev3Access ? $lev3Access->is_delete : 0,
                                "is_approve" => $lev3Access ? $lev3Access->is_approve : 0,
                            )
                        );
                    }
                    $lev2Access = AccessModel::where('group_id', '=', $id)->where('menu_id', '=', $l2->menu_id)->first();
                    $_lev2[] = array(
                        'id' => $l2->menu_id,
                        'menu_name' => $l2->menu_title,
                        'ordering' => $l2->ordering,
                        'level3' => $_lev3,
                        'checked' => array(
                            "is_create" => $lev2Access ? $lev2Access->is_create : 0,
                            "is_read" => $lev2Access ? $lev2Access->is_read : 0,
                            "is_update" => $lev2Access ? $lev2Access->is_update : 0,
                            "is_delete" => $lev2Access ? $lev2Access->is_delete : 0,
                            "is_approve" => $lev2Access ? $lev2Access->is_approve : 0,
                        )
                    );
                }

                $lev1Access = AccessModel::where('group_id', '=', $id)->where('menu_id', '=', $l1->menu_id)->first();
                $_lev1[] = array(
                    'id' => $l1->menu_id,
                    'menu_name' => $l1->menu_title,
                    'ordering' => $l1->ordering,
                    'level2' => $_lev2,
                    'checked' => array(
                        "is_create" => $lev1Access ? $lev1Access->is_create : 0,
                        "is_read" => $lev1Access ? $lev1Access->is_read : 0,
                        "is_update" => $lev1Access ? $lev1Access->is_update : 0,
                        "is_delete" => $lev1Access ? $lev1Access->is_delete : 0,
                        "is_approve" => $lev1Access ? $lev1Access->is_approve : 0,
                    )
                );
            }

            $parentAccess = AccessModel::where('group_id', '=', $id)->where('menu_id', '=', $row->menu_id)->first();
            $_parent[] = array(
                'id' => $row->menu_id,
                'menu_name' => $row->menu_title,
                'ordering' => $row->ordering,
                'level1' => $_lev1,
                'checked' => array(
                    "is_create" => $parentAccess ? $parentAccess->is_create : 0,
                    "is_read" => $parentAccess ? $parentAccess->is_read : 0,
                    "is_update" => $parentAccess ? $parentAccess->is_update : 0,
                    "is_delete" => $parentAccess ? $parentAccess->is_delete : 0,
                    "is_approve" => $parentAccess ? $parentAccess->is_approve : 0,
                )
            );

        }

        return $_parent;
    }

    /**
     * @param string $position
     * @return null|string
     */
    public static function generateMenu($position = 'adminsidebar')
    {
        $menu = new MenuModel();
        $parent = $menu->getParentByType($position);
        $html = null;
        if (count($parent) > 0) {
            $html = '<ol class="dd-list dd-nodrag">';
            foreach ($parent as $lev1) {
                $child1 = $menu->getMenuByParent($lev1->menu_id, [0, 1]);
                $action1 = '<div style="float:right">';
                if (AppHelpers::access('is_update', 'admin.system.menus')):
                    $action1 .= '<a href="' . route('admin.system.menus.update', ['update' => AppHelpers::encode_id($lev1->menu_id)]) . '" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i></a>';
                endif;
                if (AppHelpers::access('is_delete', 'admin.system.menus')):
                    $action1 .= '<button type="button" class="btn btn-xs btn-danger" onclick="appRemove(\'' . AppHelpers::encode_id($lev1->menu_id) . '\',\'' . $lev1->menu_title . '\')"><i class="fa fa-trash-o"></i></button>';
                endif;
                $action1 .= '</div>';
                $html .= '<li class="dd-item" data-id="' . $lev1->menu_id . '">';
                $html .= '<div class="dd-handle">' . $lev1->menu_title . ' <i class="fa fa-link"></i> <em>' . $lev1->url . '</em>&nbsp;&nbsp;' . AppHelpers::getActive($lev1->active) . $action1 . '</div>';
                if (count($child1) > 0) {
                    $html .= '<ol class="dd-list dd-nodrag">';
                    foreach ($child1 as $lev2) {
                        $child2 = $menu->getMenuByParent($lev2->menu_id, [0, 1]);
                        $action2 = '<div style="float:right">';
                        if (AppHelpers::access('is_update', 'admin.system.menus')):
                            $action2 .= '<a href="' . route('admin.system.menus.update', ['update' => AppHelpers::encode_id($lev2->menu_id)]) . '" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i></a>';
                        endif;
                        if (AppHelpers::access('is_delete', 'admin.system.menus')):
                            $action2 .= '<button type="button" class="btn btn-xs btn-danger" onclick="appRemove(\'' . AppHelpers::encode_id($lev2->menu_id) . '\',\'' . $lev2->menu_title . '\')"><i class="fa fa-trash-o"></i></button>';
                        endif;
                        $action2 .= '</div>';
                        $html .= '<li class="dd-item" data-id="' . $lev2->menu_id . '">';
                        $html .= '<div class="dd-handle">' . $lev2->menu_title . ' <i class="fa fa-link"></i> <em>' . $lev2->url . '</em>&nbsp;&nbsp;' . AppHelpers::getActive($lev2->active) . $action2 . '</div>';
                        if (count($child2) > 0) {
                            $html .= '<ol class="dd-list dd-nodrag">';
                            foreach ($child2 as $lev3) {
                                $child3 = $menu->getMenuByParent($lev3->menu_id, [0, 1]);
                                $action3 = '<div style="float:right">';
                                if (AppHelpers::access('is_update', 'admin.system.menus')):
                                    $action3 .= '<a href="' . route('admin.system.menus.update', ['update' => AppHelpers::encode_id($lev3->menu_id)]) . '" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i></a>';
                                endif;
                                if (AppHelpers::access('is_delete', 'admin.system.menus')):
                                    $action3 .= '<button type="button" class="btn btn-xs btn-danger" onclick="appRemove(\'' . AppHelpers::encode_id($lev3->menu_id) . '\',\'' . $lev3->menu_title . '\')"><i class="fa fa-trash-o"></i></button>';
                                endif;
                                $action3 .= '</div>';
                                $html .= '<li class="dd-item" data-id="' . $lev3->menu_id . '">';
                                $html .= '<div class="dd-handle">' . $lev3->menu_title . ' <i class="fa fa-link"></i> <em>' . $lev3->url . '</em>&nbsp;&nbsp;' . AppHelpers::getActive($lev3->active) . $action3 . '</div>';
                                if (count($child3) > 0) {
                                    $html .= '<ol class="dd-list dd-nodrag">';
                                    foreach ($child3 as $lev4) {
                                        $child4 = $menu->getMenuByParent($lev4->menu_id, [0, 1]);
                                        $action4 = '<div style="float:right">';
                                        if (AppHelpers::access('is_update', 'admin.system.menus')):
                                            $action4 .= '<a href="' . route('admin.system.menus.update', ['update' => AppHelpers::encode_id($lev4->menu_id)]) . '" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i></a>';
                                        endif;
                                        if (AppHelpers::access('is_delete', 'admin.system.menus')):
                                            $action4 .= '<button type="button" class="btn btn-xs btn-danger" onclick="appRemove(\'' . AppHelpers::encode_id($lev4->menu_id) . '\',\'' . $lev4->menu_title . '\')"><i class="fa fa-trash-o"></i></button>';
                                        endif;
                                        $action4 .= '</div>';
                                        $html .= '<li class="dd-item" data-id="' . $lev4->menu_id . '">';
                                        $html .= '<div class="dd-handle">' . $lev4->menu_title . ' <i class="fa fa-link"></i> <em>' . $lev4->url . '</em>&nbsp;&nbsp;' . AppHelpers::getActive($lev4->active) . $action4 . '</div>';
                                        if (count($child4) > 0) {
                                            $html .= '<ol class="dd-list dd-nodrag">';
                                            foreach ($child4 as $lev5) {
                                                $action5 = '<div style="float:right">';
                                                if (AppHelpers::access('is_update', 'admin.system.menus')):
                                                    $action5 .= '<a href="' . route('admin.system.menus.update', ['update' => AppHelpers::encode_id($lev5->menu_id)]) . '" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i></a>';
                                                endif;
                                                if (AppHelpers::access('is_delete', 'admin.system.menus')):
                                                    $action5 .= '<button type="button" class="btn btn-xs btn-danger" onclick="appRemove(\'' . AppHelpers::encode_id($lev5->menu_id) . '\',\'' . $lev5->menu_title . '\')"><i class="fa fa-trash-o"></i></button>';
                                                endif;
                                                $action5 .= '</div>';
                                                $html .= '<li class="dd-item" data-id="' . $lev5->menu_id . '">';
                                                $html .= '<div class="dd-handle">' . $lev5->menu_title . ' <i class="fa fa-link"></i> <em>' . $lev5->url . '</em>&nbsp;&nbsp;' . AppHelpers::getActive($lev5->active) . $action5 . '</div>';
                                                $html .= '</li>';
                                            }
                                            $html .= '</ol>';
                                        }
                                        $html .= '</li>'; //end li $child3
                                    }
                                    $html .= '</ol>';
                                }
                                $html .= '</li>'; //end li $child2
                            }
                            $html .= '</ol>';
                        }
                        $html .= '</li>'; //end li $child1
                    }
                    $html .= '</ol>';
                }
                $html .= '</li>'; //end li $parent
            }
        }
        return $html;
    }

    /**
     * @param $group
     * @return mixed
     */
    public static function getNavigation($group)
    {
        $menu = new MenuModel();
        return $menu->getActiveByPosition($group);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function group()
    {
        $data['title'] = __('module.menu_group_title');
        return view('backend.core.menus.group-index', $data);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function group_create()
    {
        $data['title'] = __('common.add') . ' ' . __('module.menu_group_title');
        return view('backend.core.menus.group-form', $data);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function group_store(Request $request)
    {
        $data = $request->all();
        if ($data) {
            $key = AppHelpers::decode_id($data['secure_id']);
            if (!$data['secure_id']) {
                AppHelpers::permission('is_create', 'admin.system.menus', false, 'module');
                $result = $this->group;
                $result->menu_group = $data['menu_group'];
                $result->menu_group_alias = $data['menu_group_alias'];
                if ($result->save()) {
                    AppHelpers::auditTrail($request, sprintf(__('common.log_add'), $result->menu_id));
                    return redirect($this->url)->with('message', __('common.success_save'))
                        ->with('type', 'success');
                } else {
                    return redirect($this->url)->with('message', __('common.failed_save'))
                        ->with('type', 'error');
                }
            } else {
                AppHelpers::permission('is_update', 'admin.system.menus', false, 'module');
                $result = $this->group->find($key);
                $result->menu_group = $data['menu_group'];
                $result->menu_group_alias = $data['menu_group_alias'];
                if ($result->save()) {
                    AppHelpers::auditTrail($request, sprintf(__('common.log_edit'), $key));
                    return redirect($this->url)->with('message', __('common.success_update'))
                        ->with('type', 'success');
                } else {
                    return redirect($this->url)->with('message', __('common.failed_update'))
                        ->with('type', 'error');
                }
            }
        }
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function group_grid()
    {
        $data = $this->group->all();
        return Datatables::of($data)
            ->editColumn('name', function ($data) {
                return $data->menu_group;
            })->editColumn('alias', function ($data) {
                return $data->menu_group_alias;
            })->addColumn('action', function ($data) {
                $id = AppHelpers::encode_id($data->id);
                $buttons = '';
                if (AppHelpers::access('is_update', 'admin.system.menus')):
                    $buttons .= '<a href="' . route('admin.system.menus.group_update', ['update' => $id]) . '" type="button" class="btn btn-xs btn-default"><span class="fa fa-pencil"></span></a>';
                endif;
                if (AppHelpers::access('is_delete', 'admin.system.menus')):
                    $buttons .= '<a href="' . route('admin.system.menus.group_destroy', ['id' => $id]) . '" type="button" class="btn btn-xs btn-danger"><span class="fa fa-trash-o"></span></a>';
                endif;
                return $buttons;
            })->make(true);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        AppHelpers::permission('is_read', 'admin.system.menus', false, 'module');
        $data['groupMenus'] = $this->group->all();
        $data['title'] = __('module.menu') . ' ' . __('common.list');
        return view('backend.core.menus.index', $data);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Request $request)
    {
        AppHelpers::permission('is_create', 'admin.system.menus', false, 'module');
        $data['item'] = $this->model;
        $data['type'] = $request->menu_type;
        $data['groupMenus'] = $this->group->all();
        $data['title'] = __('common.add') . ' ' . __('module.menu');
        return view('backend.core.menus.form', $data);
    }

    /**
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     * @throws \Mcamara\LaravelLocalization\Exceptions\SupportedLocalesNotDefined
     */
    public function store(Request $request)
    {
        $insert = [];
        $data = $request->all();
        if ($data) {
            $key = AppHelpers::decode_id($data['secure_id']);
            Validator::make($data, [
                'menu_title_en' => 'required',
                'menu_type' => 'required',
                'module' => 'required|' . Rule::unique('tb_menu')->ignore($key, 'menu_id'),
                'url' => 'required|' . Rule::unique('tb_menu')->ignore($key, 'menu_id'),
            ], [
                'menu_title_en.required' => 'Menu title (english) is required!',
                'module.required' => 'Route module is required!',
                'module.unique' => 'Route module is already exist!',
                'url.required' => 'Menu URL is required!',
                'menu_type.required' => 'Menu Position is required!',
                'url.unique' => 'Menu URL is already exist!',
            ])->validate();

            if (!$data['secure_id']) {
                AppHelpers::permission('is_create', 'admin.system.menus', false, 'module');
                $result = $this->model;
                $result->module = $data['module'];
                $result->url = $data['url'];
                $result->menu_icons = $data['menu_icons'];
                $result->menu_type = $data['menu_type'];
                $result->parent_id = $data['parent_id'] ? $data['parent_id'] : 0;
                $result->ordering = $data['ordering'];
                $result->active = $data['active'];
                if ($result->save()) {
                    foreach ($this->locale->getSupportedLocales() as $locale => $val) {
                        $insert[$locale] = [
                            'menu_id' => $result->menu_id,
                            'menu_title' => $data['menu_title_' . $locale],
                            'meta_title' => $data['meta_title_' . $locale],
                            'meta_description' => $data['meta_description_' . $locale],
                            'locale' => $locale,
                            'created_at' => Carbon::now()
                        ];
                        $this->translation->saveRow($insert[$locale]);
                    }
                    AppHelpers::auditTrail($request, sprintf(__('common.log_add'), $result->menu_id));
                    return redirect($this->url)->with('message', __('common.success_save'))
                        ->with('type', 'success');
                } else {
                    return redirect($this->url . '/create')->with('message', __('common.failed_save'))
                        ->with('type', 'error')->withInput();
                }
            } else {
                AppHelpers::permission('is_update', 'admin.system.menus', false, 'module');
                $result = $this->model->find($key);
                $result->module = $data['module'];
                $result->url = $data['url'];
                $result->menu_icons = $data['menu_icons'];
                $result->menu_type = $data['menu_type'];
                $result->parent_id = $data['parent_id'] ? $data['parent_id'] : 0;
                $result->ordering = $data['ordering'];
                $result->active = $data['active'];
                if ($result->save()) {
                    $this->translation->where('menu_id', '=', $key)->delete();
                    foreach ($this->locale->getSupportedLocales() as $locale => $val) {
                        $insert[$locale] = [
                            'menu_id' => $key,
                            'menu_title' => $data['menu_title_' . $locale],
                            'meta_title' => $data['meta_title_' . $locale],
                            'meta_description' => $data['meta_description_' . $locale],
                            'locale' => $locale,
                            'created_at' => Carbon::now()
                        ];
                        $this->translation->saveRow($insert[$locale]);
                    }
                    AppHelpers::auditTrail($request, sprintf(__('common.log_edit'), $key));
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
     * Parsing json data menu & reorder
     */
    public function reorderMenu()
    {
        $decoded = json_decode($_POST['menu']);
        $this->parsingMenu($decoded);
        echo json_encode(array("stat" => true));
        Session::flash('message', __('common.success_save'));
        Session::flash('type', 'success');
    }

    /**
     * @param $dec
     * @param int $order
     * @param int $level
     */
    public function parsingMenu($dec, $order = 0, $level = 0)
    {
        foreach ($dec as $key) {
            $order++;
            $this->model->where('menu_id', $key->id)->update(['ordering' => $order]);

            if (isset($key->children)) {
                foreach ($key->children as $keychild) {
                    $this->model->where('menu_id', $keychild->id)->update(['parent_id' => $key->id]);
                }
                $this->parsingMenu($key->children, 0, $level + 1);
            } else {
                if ($level == 0) {
                    $this->model->where('menu_id', $key->id)->update(['parent_id' => 0]);
                }
            }
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function update($id)
    {
        AppHelpers::permission('is_update', 'admin.system.menus', false, 'module');
        $key = AppHelpers::decode_id($id);
        $items = $this->model->findOrFail($key);
        $data['item'] = $items;
        $data['type'] = $items->menu_type;
        $data['groupMenus'] = $this->group->all();
        $data['secure_id'] = $id;
        $data['title'] = __('common.edit') . ' ' . __('module.menu');
        return view('backend.core.menus.form', $data);
    }

    /**
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        AppHelpers::permission('is_delete', 'admin.system.menus', false, 'module');
        if (!empty($request->secure_id)) {
            $id = AppHelpers::decode_id($request->secure_id);
        } else {
            return redirect($this->url)->with('message', __('common.no_request'))
                ->with('type', 'error');
        }

        $data = $this->model->find($id);
        if ($data) {
            $child = $this->model->where('parent_id', $id)->count();
            if ($child > 0) {
                return redirect($this->url)->with('message', 'Failed to delete this menu. ' . $child . ' child menu assigned.')
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
     * @param $type
     * @return string
     */
    public function generateAdminSideMenu($type)
    {
        $parent = $this->model->getParentByTypeStatus($type);
        $html = '';
        foreach ($parent as $p1) {
            $child2 = $this->model->getMenuByParent($p1->menu_id);
            $access1 = AppHelpers::permission('is_read', $p1->menu_id, true);
            $ch1 = count($child2) > 0 ? 'xn-openable' : '';
            if ($access1 == true) {
                $html .= '<li class="' . $ch1 . ' ' . active([$p1->module]) . '"><a href="' . url($p1->url) . '"><i class="' . $p1->menu_icons . '"></i><span class="xn-text">' . $p1->menu_title . '</span>';
                if (count($child2) > 0) {
                    $html .= '</a>';
                    $html .= '<ul>';
                    foreach ($child2 as $p2) {
                        $child3 = $this->model->getMenuByParent($p2->menu_id);
                        $access2 = AppHelpers::permission('is_read', $p2->menu_id, true);
                        $ch2 = count($child3) > 0 ? 'xn-openable' : '';
                        if ($access2 == true) {
                            $html .= '<li class="' . $ch2 . ' ' . active([$p2->module]) . '"><a href="' . url($p2->url) . '"><span class="xn-text">' . $p2->menu_title . '</span>';
                            if (count($child3) > 0) {
                                $html .= '</a>';
                                $html .= '<ul>';
                                foreach ($child3 as $p3) {
                                    $child4 = $this->model->getMenuByParent($p3->menu_id);
                                    $access3 = AppHelpers::permission('is_read', $p3->menu_id, true);
                                    $ch3 = count($child4) > 0 ? 'xn-openable' : '';
                                    if ($access3 == true) {
                                        $html .= '<li class="' . $ch3 . ' ' . active([$p3->module]) . '"><a href="' . url($p3->url) . '"><span class="xn-text">' . $p3->menu_title . '</span>';
                                        if (count($child4) > 0) {
                                            $html .= '</a>';
                                            $html .= '<ul>';
                                            foreach ($child4 as $p4) {
                                                $html .= '<li class="' . active([$p4->module]) . '"><a href="' . url($p4->url) . '"><span class="xn-text">' . $p4->menu_title . '</span>';
                                            }
                                            $html .= '</ul>';
                                        } else {
                                            $html .= '</a>';
                                        }
                                        $html .= '</li>';
                                    }
                                }
                                $html .= '</ul>';
                            } else {
                                $html .= '</a>';
                            }
                            $html .= '</li>';
                        }
                    }
                    $html .= '</ul>';
                } else {
                    $html .= '</a>';
                }
                $html .= '</li>';
            }
        }
        $html .= '';

        return $html;
    }
}