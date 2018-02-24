<?php

namespace App\Http\Middleware;

use Closure;
use Validator;
// use Illuminate\Http\Request;

class CheckId
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
        $id = $request->id;

        if (!is_numeric($id)) {
            dd('查询id不存在');
        }
        return $next($request);
    }
}
