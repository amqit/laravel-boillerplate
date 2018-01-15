<?php
/**
 * Description: GeneralModel.php PhpStorm
 *
 * @author      Alex
 * @created     20/08/2017, modified: 20/08/2017 00:33
 * @copyright   Copyright (c) 2017.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class       GeneralModel
 * @package App\Models
 */
class GeneralModel extends Model
{
    protected $table;
    protected $key;

    /**
     * Fungsi untuk proses insert / update data
     * @param $data
     * @param $id
     * @return mixed
     */
    public function saveRow($data, $id = null)
    {
        $table = with(new static)->table;
        $key = with(new static)->primaryKey;
        if ($id == null) {
            // Insert Here
            $id = \DB::table($table)->insertGetId($data);
        } else {
            // Update here
            $id = \DB::table($table)->where($key, $id)->update($data);
        }
        return $id;
    }

    /**
     * Fungsi untuk menapilkan data row dari requested id
     * @param $id
     * @return array
     */
    public function getRow($id)
    {
        $table = with(new static)->table;
        $key = with(new static)->primaryKey;

        $data = \DB::table($table)->where($key, $id)->get();
        if (count($data) <= 0) {
            $result = array();
        } else {
            $result = $data[0];
        }
        return $result;
    }

    /**
     * Fungsi untuk menapilkan semua data
     * @return mixed
     */
    public function getAll(){
        $table = with(new static)->table;
        $key = with(new static)->primaryKey;

        $result = \DB::table($table)
            ->orderBy($key, 'DESC')
            ->get();
        return $result;
    }

    /**
     * Fungsi untuk menampilkan excluded data
     * @param $column
     * @param array $value
     * @return mixed
     */
    public function getExclude($column, $value = array()){
        $table = with(new static)->table;
        $key = with(new static)->primaryKey;

        $result = \DB::table($table)
            ->whereNotIn($column, $value)
            ->orderBy($key, 'DESC')
            ->get();

        return $result;
    }

    /**
     * Fungsi untuk count all data
     * @return mixed
     */
    public function getCountAll()
    {
        $table = with(new static)->table;
        $result = \DB::table($table)
            ->count();

        return $result;
    }
}