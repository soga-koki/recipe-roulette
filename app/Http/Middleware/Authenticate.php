<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function authenticated(Request $request, $user)
    {
        if ($user->role == 'admin') {
            return redirect('/admin/dashboard'); // 管理者のダッシュボードURL
        }
    
        return redirect('/member/dashboard'); // 会員のダッシュボードURL
    }
}
