<?php
/**
 * Description: GroupsModel.php PhpStorm.
 *
 * @package     elnusa_v2
 * @author      alex
 * @created     03/12/2017, modified: 03/12/2017 19:19
 * @copyright   Copyright (c) 2017.
 */

namespace App\Models\Core;


use App\Models\GeneralModel;

/**
 * @property string name
 * @property string description
 * @property string alias
 * @property mixed group_id
 */
class GroupsModel extends GeneralModel
{
    protected $table = 'tb_groups';
    protected $primaryKey = 'group_id';
    protected $fillable = ['name','description','alias'];
    protected $guarded = ['created_at', 'updated_at'];

    /**
     * GroupsModel constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }
}