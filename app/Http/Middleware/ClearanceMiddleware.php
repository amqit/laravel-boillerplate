<?php
/**
 * Description: ClearanceMiddleware.php PhpStorm.
 *
 * @package     elnusa_v2
 * @author      alex
 * @created     03/12/2017, modified: 03/12/2017 18:26
 * @copyright   Copyright (c) 2017.
 */

namespace App\Http\Middleware;

use Closure;

class ClearanceMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        if($request->session()->get('alias') == 'superadmin'){
            return $next($request);
        }

        if ($request->is('admin')) {
            if ($request->session()->get('alias') == 'users') {
                abort('401');
            }
        }

        return $next($request);

    }
}