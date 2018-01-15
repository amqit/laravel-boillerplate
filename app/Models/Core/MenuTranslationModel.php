<?php
/**
 * Description: MenuTranslationModel.php PhpStorm.
 *
 * @package     pusaka-maluku
 * @author      alex
 * @created     28/12/2017, modified: 28/12/2017 06:46
 * @copyright   Copyright (c) 2017.
 */

namespace App\Models\Core;
use App\Models\GeneralModel;

/**
 * @property  integer menu_id
 * @property  string menu_title
 * @property  string meta_title
 * @property  string meta_description
 * @property  string locale
 */
class MenuTranslationModel extends GeneralModel
{
    /**
     * @var string
     */
    protected $table = 'tb_menu_translation';
    protected $related = 'tb_menu';
    protected $primaryKey = 'id';
    protected $guarded = ['created_at', 'updated_at'];

    /**
     * MenuTranslationModel constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }
}