<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Fortify\Rules\Password;

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
    
            // TODO: FIND USER BY EMAIL
            
            $credentials = request(['email','password']);
            if (!Auth::attempt($credentials)) 
            {
                return ResponseFormatter::error(['Unauthorized'],401);
            }
                
            $user = User::where('email',$request->email)->first();
                

            if (!Hash::check($request->password, $user->password)) 
            {
                throw new Exception('Invalid Password');
            }
            // TODO: GENERATE TOKEN
            $tokenresult = $user->createToken('authToken')->plainTextToken;
                
            // TODO: RETURN RESPONSE
            return ResponseFormatter::success([
                'access_token' => $tokenresult,
                'token_type' => 'Bearer',
                'user' => $user
            ],'Login Sukses');
        } catch (Exception $error) {
            //throw $th;
            return ResponseFormatter::error('Authentification Failed');
        }

    }
    public function register(Request $request)
    {
        try {
            //TODO: VALIDATE REQUEST
            $request->validate([
                'name' => ['required','string','max:255'],
                'email' => ['required','string','email','max:255','unique:users'],
                'password' => ['required','string',new Password],
            ]);
            //TODO: CREATE USER
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
            //TODO: GENERATE TOKEN
            $tokenresult = $user->createToken('authToken')->plainTextToken;
            //TODO  : RETURN RESPONSE
            return ResponseFormatter::success([
                'access_token' => $tokenresult,
                'token_type' => 'Bearer',
                'user' => $user
            ],'Register Sukses');

        } catch (Exception $error) {
            //TODO: RETURN ERROR RESPONSE
            return ResponseFormatter::error('Register Gagal');
        }
    }
    public function logout(Request $request)
    {
        // TODO: REVOKE TOKEN
        $token = $request->user()->currentAccessToken()->delete();
        // TODO: RETURN RESPONSE
        return ResponseFormatter::success($token,'logout sukses');
    }
    public function fetch(Request $request)
    {
        // TODO: GET USER
        $user = $request->user();
        // TODO: RETURN RESPONSE
        return ResponseFormatter::success($user,'Fetch berhasil');

    }
}
