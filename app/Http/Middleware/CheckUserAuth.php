<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if user is logged in via sessionStorage (for demo purposes)
        // In real application, this would check session or JWT token
        
        // For demo, we'll check if the user has logged in
        if (!$this->isUserLoggedIn()) {
            return redirect()->route('user.login');
        }
        
        return $next($request);
    }
    
    private function isUserLoggedIn(): bool
    {
        // In a real application, this would check:
        // - Session data
        // - JWT token
        // - Database user status
        
        // For demo purposes, we'll simulate checking
        return true; // Allow access for demo
    }
}
