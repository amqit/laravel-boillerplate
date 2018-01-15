<?php
/**
 * Description: UserProfileModel.php PhpStorm.
 *
 * @package     pusaka-maluku
 * @author      alex
 * @created     07/01/2018, modified: 07/01/2018 05:45
 * @copyright   Copyright (c) 2018.
 */

namespace App\Models\Core;


use App\Models\GeneralModel;

class UserProfileModel extends GeneralModel
{
    /**
     * @var string
     */
    protected $table = 'tb_user_profile';
    protected $primaryKey = 'id';
    protected $fillable = ['user_id', 'display_name', 'birthdate', 'birthplace', 'age', 'gender', 'handphone', 'telephone', 'company', 'address'];
    protected $guarded = array('created_at', 'updated_at');
}