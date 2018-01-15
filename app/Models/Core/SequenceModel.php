<?php
/**
 * Description: SequenceModel.php PhpStorm.
 *
 * @package     elnusa_v2
 * @author      alex
 * @created     03/12/2017, modified: 03/12/2017 19:20
 * @copyright   Copyright (c) 2017.
 */

namespace App\Models\Core;


use App\Models\GeneralModel;

class SequenceModel extends GeneralModel
{
    protected $table = 'tb_sequence';
    protected $primaryKey = 'seq_id';

    /**
     * SequenceModel constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }
}