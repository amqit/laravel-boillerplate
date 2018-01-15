<?php
/**
 * Description: MenuModel.php PhpStorm.
 *
 * @package     elnusa_v2
 * @author      alex
 * @created     09/12/2017, modified: 09/12/2017 21:01
 * @copyright   Copyright (c) 2017.
 */

namespace App\Models\Core;

use App\Models\GeneralModel;

/**
 * Class       MenuModel
 * @property string module
 * @property string url
 * @property string menu_icons
 * @property int parent_id
 * @property int ordering
 * @property int active
 * @property mixed menu_id
 * @property string menu_type
 * @package App\Models\Core
 * $
 */
class MenuModel extends GeneralModel
{
    /**
     * @var string
     */
    protected $table = 'tb_menu';
    protected $related = 'tb_menu_translation';
    protected $primaryKey = 'menu_id';
    protected $fillable = ['parent_id', 'module', 'url', 'menu_type', 'is_restrict', 'ordering', 'active', 'menu_icons'];
    protected $guarded = array('created_at', 'updated_at');

    /**
     * MenusModel constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param $type
     * @return mixed
     */
    public function getParentByType($type)
    {
        $result = \DB::table($this->table)
            ->join($this->related, $this->table . '.' . $this->primaryKey, '=', $this->related . '.' . $this->primaryKey)
            ->where($this->table . '.parent_id', '=', 0)
            ->where($this->table . '.menu_type', '=', $type)
            ->where($this->related . '.locale', '=', config('app.locale'))
            ->select($this->table . '.*', $this->related . '.*')
            ->orderBy($this->table . '.ordering')
            ->get();

        return $result;
    }

    /**
     * @param $type
     * @return mixed
     */
    public function getParentByTypeStatus($type)
    {
        $result = \DB::table($this->table)
            ->join($this->related, $this->table . '.' . $this->primaryKey, '=', $this->related . '.' . $this->primaryKey)
            ->where($this->table . '.parent_id', '=', 0)
            ->where($this->table . '.menu_type', '=', $type)
            ->where($this->related . '.locale', '=', config('app.locale'))
            ->where($this->table . '.active', '=', 1)
            ->select($this->table . '.*', $this->related . '.*')
            ->orderBy($this->table . '.ordering')
            ->get();
        return $result;
    }

    /**
     * Get all active menu by menu position
     *
     * @param $type
     * @return mixed
     */
    public function getActiveByPosition($type)
    {
        $result = \DB::table($this->table)
            ->join($this->related, $this->table . '.' . $this->primaryKey, '=', $this->related . '.' . $this->primaryKey)
            ->where($this->table . '.menu_type', '=', $type)
            ->where($this->related . '.locale', '=', config('app.locale'))
            ->where($this->table . '.active', '=', 1)
            ->select($this->table . '.*', $this->related . '.*')
            ->orderBy($this->table . '.ordering')
            ->get();
        return $result;
    }

    /**
     * @param $id
     * @param array $active
     * @return mixed
     */
    public function getMenuByParent($id, $active = [1])
    {
        $result = \DB::table($this->table)
            ->join($this->related, $this->table . '.' . $this->primaryKey, '=', $this->related . '.' . $this->primaryKey)
            ->where($this->table . '.parent_id', '=', $id)
            ->where($this->related . '.locale', '=', config('app.locale'))
            ->whereIn($this->table . '.active', $active)
            ->select($this->table . '.*', $this->related . '.*')
            ->orderBy($this->table . '.ordering')
            ->get();
        return $result;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function translation()
    {
        return $this->hasMany('App\Models\Core\MenuTranslationModel', 'menu_id', 'menu_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function group()
    {
        return $this->belongsTo('App\Models\Core\MenuGroupModel', 'menu_type', 'id');
    }

}