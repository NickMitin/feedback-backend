<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RawPostData
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $postData = file_get_contents('php://input');
        file_put_contents(app_path('post_debug.txt'), $postData . "\n\n\n", FILE_APPEND);
        return $next($request);
    }
}
