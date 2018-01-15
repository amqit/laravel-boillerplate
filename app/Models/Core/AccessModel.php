<?php
/**
 * Description: AccessModel.php PhpStorm.
 *
 * @package     elnusa_v2
 * @author      alex
 * @created     03/12/2017, modified: 03/12/2017 19:19
 * @copyright   Copyright (c) 2017.
 */

namespace App\Models\Core;


use Illuminate\Database\Eloquent\Model;

class AccessModel extends Model
{
    protected $table = 'tb_access';
    protected $primaryKey = 'access_id';
    protected $guarded = ['created_at', 'updated_at'];

    /**
     * AccessModel constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }
}