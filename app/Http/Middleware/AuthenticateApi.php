<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class AuthenticateApi extends Middleware
{
    protected function authenticate($request, array $guards)
    {
        $token = $request->query("api_token");
        if ($token === config('auth_api_tokens')[0]) {
            return;
        }
        $this->unauthenticated($request, $guards);
    }
}
