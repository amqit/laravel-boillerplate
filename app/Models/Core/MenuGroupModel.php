<?php
/**
 * Description: MenuGroupModel.php PhpStorm.
 *
 * @package     pusaka-maluku
 * @author      alex
 * @created     06/01/2018, modified: 06/01/2018 03:04
 * @copyright   Copyright (c) 2018.
 */

namespace App\Models\Core;


use App\Models\GeneralModel;

/**
 * @property  string menu_group
 * @property  string menu_group_alias
 */
class MenuGroupModel extends GeneralModel
{
    /**
     * @var string
     */
    protected $table = 'tb_menu_group';
    protected $primaryKey = 'id';
    protected $fillable = ['menu_group','menu_group_alias'];
    protected $guarded = ['created_at', 'updated_at'];

    /**
     * MenuGroupModel constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }
}