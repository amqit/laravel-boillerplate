<?php
/**
 * Description: CommonApiController.php PhpStorm.
 *
 * @package     elnusa_v2
 * @author      alex
 * @created     10/12/2017, modified: 10/12/2017 02:40
 * @copyright   Copyright (c) 2017.
 */

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Libraries\AppHelpers;
use App\Models\Core\GroupsModel;
use App\Models\Core\MenuModel;
use Illuminate\Http\Request;

/**
 * @property MenuModel menu
 * @property GroupsModel group
 */
class CommonApiController extends Controller
{
    /**
     * CommonApiController constructor.
     */
    public function __construct()
    {
        $this->menu = new MenuModel();
        $this->group = new GroupsModel();
    }

    /**
     * Rest api get menu
     *
     * @param null $type
     * @param null $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function get_menu($type = null, $id = null)
    {
        if($id){
            $key = AppHelpers::decode_id($id);
            $data = $this->menu->join('tb_menu_translation','tb_menu.menu_id','=','tb_menu_translation.menu_id')
                ->where('tb_menu_translation.locale','=',config('app.locale'))
                ->where('tb_menu.menu_type','=',$type)
                ->whereNotIn('tb_menu.menu_id',[$key])->get();
        } else {
            $data = $this->menu->join('tb_menu_translation','tb_menu.menu_id','=','tb_menu_translation.menu_id')
                ->where('tb_menu.menu_type','=',$type)
                ->where('tb_menu_translation.locale','=',config('app.locale'))->get();
        }
        $_data = array();
        foreach ($data as $row) {
            $_data[] = array(
                htmlspecialchars($row->menu_id, ENT_QUOTES),
                htmlspecialchars($row->menu_title, ENT_QUOTES)
            );
        }
        return response()->json($_data);
    }

    /**
     * Rest api get group
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function get_group()
    {
        $data = $this->group->whereNotIn('alias',['superadmin'])->get();
        $_data = array();
        foreach ($data as $row) {
            $_data[] = array(
                htmlspecialchars($row->group_id, ENT_QUOTES),
                htmlspecialchars($row->name, ENT_QUOTES)
            );
        }
        return response()->json($_data);
    }
}