<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\RegisterUserRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class RegisterController extends Controller
{
    /**
     * Регистрация пользователя
     * @param RegisterUserRequest $request
     * @return JsonResponse
     */

    public function registerForm(Request $request)
    {
        $arr = [
            'email' => $request->email ,
            'password' => bcrypt($request->password),
            'name' => $request->name
        ];

        $user = User::create($arr);

        return view('registration-success', ['auth' => $user]);
    }

    public function register()
    {
        return view('register');
    }
}
