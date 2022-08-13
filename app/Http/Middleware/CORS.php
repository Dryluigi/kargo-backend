<?php

namespace App\Http\Middleware;

use Closure;
use Facade\FlareClient\Http\Response;

class CORS
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
        $headers = [
            'Access-Control-Allow-Methods' => 'POST, GET, OPTIONS, PUT, DELETE',
            'Access-Control-Allow-Headers' => 'Content-Type, X-Auth-Token, Origin',
            'Access-Control-Allow-Origin' => '*'
        ];

        $response = $next($request);
        foreach ($headers as $key => $value)
            $response->header($key, $value);
        return $response;
    }
}
