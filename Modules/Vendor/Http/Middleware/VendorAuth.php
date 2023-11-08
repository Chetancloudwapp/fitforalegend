<?php

namespace Modules\Vendor\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class VendorAuth
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
        if(!Auth::guard('vendor')->check()){
            return redirect('vendor/vendor-login');
        }
        return $next($request);
    }
}
