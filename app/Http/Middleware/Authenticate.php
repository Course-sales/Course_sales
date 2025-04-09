<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Auth\AuthenticationException;

class Authenticate extends Middleware
{
    
    protected function unauthenticated($request, array $guards)
    {
        throw new AuthenticationException(
            'Unauthenticated.', $guards, $this->redirectTo($request, !in_array('students', $guards))
        );

    }
    
    protected function redirectTo(Request $request, $isAdmin = true): ?string
    {
        if(!$request->expectsJson()) {
            if(!$isAdmin) {
                return route('client.login');
            }
            return route('login');
        }
        return null;
    }
    
}
