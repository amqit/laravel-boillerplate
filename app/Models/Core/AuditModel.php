<?php
/**
 * Description: AuditModel.php PhpStorm.
 *
 * @package     elnusa_v2
 * @author      alex
 * @created     03/12/2017, modified: 03/12/2017 19:19
 * @copyright   Copyright (c) 2017.
 */

namespace App\Models\Core;


use Illuminate\Database\Eloquent\Model;

class AuditModel extends Model
{
    protected $table = 'tb_logs';
    protected $primaryKey = 'log_id';
    protected $guarded = ['created_at', 'updated_at'];

    /**
     * AuditModel constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\Core\UsersModel','user_id','user_id');
    }
}