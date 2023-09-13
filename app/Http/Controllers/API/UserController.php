<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(Request $request)
    {
        try {
            // TODO: VALIDATE REQUEST

            $request->validate([
                'email' => 'required|email',
                'password' => 'required'
            ]);
    
            // TODO : FIND USER BY EMAIL
            
            $credential = $request(['email','password']);
            if (Auth::attempt($credential)) {
                
            }
            // TODO : GENERATE TOKEN
            
            // TODO : RETURN RESPONSE
        } catch (Exception $e) {
            //throw $th;
        }

    }
}
