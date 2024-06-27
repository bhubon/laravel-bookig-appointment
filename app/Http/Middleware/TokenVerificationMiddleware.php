<?php

namespace App\Http\Middleware;

use App\Helper\JWTToken;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TokenVerificationMiddleware {
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response 
    {
        $token = $request->cookie('token');
        $result = JWTToken::verify_token($token);

        if ($result === 'unauthorized') {
            if ($request->routeIs('frontend.appointment')) {
                return redirect('/login')->with('message', 'Need to login to get an appointment');
            } else {
                return redirect('/admin/login');
            }
        } else {
            $request->headers->set('email', $result->user_email);
            $request->headers->set('id', $result->user_id);
            return $next($request);
        }
    }
}
