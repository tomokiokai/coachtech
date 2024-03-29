<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            if($request->is('admin/*')) return route('admin.login');
            return route('login');
            }elseif(! $request->expectsJson()) {
        if($request->is('manager/*')) return route('maneger.login');
        return route('login');
            }else return route($this->user_root);
        
    }
}
