<?php
/**
 * Description: UsersModel.php PhpStorm.
 *
 * @package     elnusa_v2
 * @author      alex
 * @created     03/12/2017, modified: 03/12/2017 19:19
 * @copyright   Copyright (c) 2017.
 */

namespace App\Models\Core;

use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class       UsersModel
 * @property mixed is_admin
 * @package App\Models\Core
 * $
 * 
 */
class UsersModel extends Authenticatable
{
    protected $table = 'tb_users';
    protected $primaryKey = 'user_id';
    protected $fillable = ['username', 'password', 'email', 'fullname', 'group_id', 'company_id', 'active', 'last_login'];
    protected $hidden = ['password', 'remember_token'];
    protected $guarded = ['created_at', 'updated_at'];
    protected $casts = [
        'is_admin' => 'boolean',
    ];

    /**
     * UsersModel constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return mixed
     */
    public function isAdmin()
    {
        return $this->is_admin;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function group()
    {
        return $this->belongsTo('App\Models\Core\GroupsModel','group_id','group_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function profile()
    {
        return $this->hasOne('App\Models\Core\UserProfileModel','user_id','user_id');
    }

}