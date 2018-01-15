<?php
/**
 * Description: AppHelpers.php PhpStorm
 *
 * @package     dslng-csr
 * @author      alex
 * @created     15/08/2017, modified: 15/08/2017 20:54
 * @copyright   Copyright (c) 2017.
 */

namespace App\Libraries;

use App\Models\Core\AccessModel;
use Carbon\Carbon;
use DateTime;
use DateTimeZone;
use DB;
use Illuminate\Support\Facades\Lang;

class AppHelpers
{

    /**
     * @param $request
     * @param $note
     */
    public static function auditTrail( $request , $note )
    {
        $data = array(
            'module'	=> $request->route()->getAction('prefix'),
            'task'		=> $request->route()->getActionMethod(),
            'user_id'   => session('uid'),
            'ipaddress'	=> $request->getClientIp(),
            'useragent'	=> $request->header('User-Agent'),
            'note'		=> $note,
            'created_at' => Carbon::now()
        );
        DB::table( 'tb_logs')->insert($data);
    }

    /**
     * make secure id
     * @param $val
     * @return string
     */
    public static function encode_id($val='')
    {
        $params = array('val' => $val);
        $secure = preg_replace('/[=]+$/', '', base64_encode(serialize($params)));
        return $secure;
    }

    /**
     * decode encrypted id
     * @param string
     * @return int
     */
    public static function decode_id($val='')
    {
        $secure = unserialize(base64_decode($val));
        return $secure['val'];
    }

    /**
     * @param $table
     * @param $column
     * @param $field
     * @param $key
     * @return mixed
     */
    public static function getRenderData($table, $column, $field, $key)
    {
        $data = DB::table($table)->select($column)->where($field, $key)->first();
        return $data->$column;
    }

    /**
     * @param $string
     * @return string
     */
    public static function slugify($string)
    {
        $slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
        return strtolower($slug);
    }


    /**
     * @param $date
     * @return string
     */
    public static function dateIndFormat($date)
    {
        $result = $date;
        if (!empty($date)) {
            $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
            $tahun = substr($date, 0, 4);
            $bulan = substr($date, 5, 2);
            $tgl = substr($date, 8, 2);
            $result = $tgl . " " . $BulanIndo[(int)$bulan - 1] . " " . $tahun;
        }
        return ($result);
    }

    /**
     * @param $date
     * @return false|string
     */
    public static function dateFormat($date)
    {
        $result = date('d/m/Y', strtotime($date));
        return ($result);
    }

    /**
     * @param $val
     * @return string
     */
    public static function unixTime($val)
    {
        $dt = new DateTime('@'.$val);
        $dt->setTimeZone(new DateTimeZone('Asia/Jakarta'));
        return $dt->format('F j, Y, g:i a');
    }

    /**
     * @param $string
     * @return string
     */
    public static function cleanString($string)
    {
        $string = str_replace(' ', '', $string); // Replaces all spaces with hyphens.
        $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.

        return strtolower(preg_replace('/-+/', '', $string)); // Replaces multiple hyphens with single one.
    }

    /**
     * @param $val
     * @return array
     */
    public static function trimId($val)
    {
        $string = explode('+', $val);
        return $string;
    }

    /**
     * @param $text
     * @param int $max_length
     * @param string $cut_off
     * @param bool $keep_word
     * @return bool|string
     */
    public static function shorten_text($text, $max_length = 140, $cut_off = '...', $keep_word = false)
    {
        if (strlen($text) <= $max_length) {
            return $text;
        }

        if (strlen($text) > $max_length) {
            if ($keep_word) {
                $text = substr($text, 0, $max_length + 1);

                if ($last_space = strrpos($text, ' ')) {
                    $text = substr($text, 0, $last_space);
                    $text = rtrim($text);
                    $text .= $cut_off;
                }
            } else {
                $text = substr($text, 0, $max_length);
                $text = rtrim($text);
                $text .= $cut_off;
            }
        }

        return $text;
    }

    /**
     * @param $val
     * @return string
     */
    public static function getActive($val)
    {
        $active = [
            0 => '<span class="label label-danger label-sm">'.Lang::get('common.inactive').'</span>',
            1 => '<span class="label label-success label-sm">'.Lang::get('common.active').'</span>',
            2 => '<span class="label label-warning label-sm">'.Lang::get('common.blocked').'</span>',
        ];
        return $active[$val];
    }

    /**
     * @param $access
     * @param $key
     * @param bool $view
     * @param string $method
     * @return bool
     */
    public static function permission($access, $key, $view = false, $method = 'menu')
    {
        if (session('alias') != 'superadmin') {
            if($method == 'module'){
                $query = AccessModel::where($access, 1)->where('module', $key)->where('group_id', session('group'))->count();
            } else {
                $query = AccessModel::where($access, 1)->where('menu_id', $key)->where('group_id', session('group'))->count();
            }

            if ($query > 0) {
                if ($view) {
                    return true;
                }
            } else {
                if ($view) {
                    return false;
                } else {
                    abort(403);
                }
            }
        } else {
            return true;
        }
    }

    /**
     * @param $access
     * @param $key
     * @return bool
     */
    public static function access($access, $key)
    {
        if (session('alias') != 'superadmin') {
            $query = AccessModel::where($access, 1)->where('module', $key)->where('group_id', session('group'))->count();
            if ($query > 0) {
                return true;
            } else {
                return false;
            }
        } else {
            return true;
        }
    }
}