<?php

namespace App\Actions\Fortify;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{
    public function toResponse($request)
    {
        $user = $request->user();

        switch ($user->role_level) {
            case 3:
                return redirect('/dashboard');
            case 2:
                return redirect('/admin/dashboard');
            case 1:
                return redirect('/superadmin/dashboard');
            default:
                return redirect('/');
        }
    }
}