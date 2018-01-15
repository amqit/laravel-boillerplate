<?php
/**
 * Description: AdminMiddleware.php PhpStorm.
 *
 * @package     elnusa_v2
 * @author      alex
 * @created     03/12/2017, modified: 03/12/2017 18:25
 * @copyright   Copyright (c) 2017.
 */

namespace App\Http\Middleware;


use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->session()->has('logged_in') && $request->session()->has('uid')) {
            if($request->session()->get('alias') != 'superadmin'){
                abort('403');
            }
        }

        return $next($request);
    }
}