<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function showFormLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $email = $request->post('email');
        $senha = md5($request->post('password'));

        $user = User::query()
            ->where('email', $email)
            ->where('senha', $senha)
            ->first();

        if ($user) {

            $user->fill([
                'ultimo_acesso' =>  date("Y-m-d H:i:s"),
                'api_token' => Str::random(60),
            ]);

            $user->save();



            Auth::loginUsingId($user->id);

            return redirect()->route('funcionarios');
        }

        $msg = "Dados inválidos!";

        return view('auth.login')
            ->with(['msg' => $msg]);

    }
}