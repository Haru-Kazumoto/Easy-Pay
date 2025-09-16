<?php

namespace App\Http\Requests;

use Laravel\Fortify\Http\Requests\LoginRequest as FortifyLoginRequest;

class LoginRequest extends FortifyLoginRequest
{
    public function username()
    {
        return $this->is('admin/*') ? 'emp_id' : config('fortify.username', 'email');
    }

    public function rules()
    {
        // gunakan username() dinamis di rules
        return [
            $this->username() => ['required', 'string'],
            'password' => ['required', 'string'],
        ];
    }
}
