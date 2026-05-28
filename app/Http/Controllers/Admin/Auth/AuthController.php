<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    protected $service;
    // load AuthService
    public function __construct(AuthService $service){
        $this->service = $service;
    }
    //handle login request
    public function login(Request $request){
        if($request->method() == 'POST' && $request->ajax()){
            try{
                $rules = [
                    'email' => 'required|email',
                    'password' => 'required|min:8'
                ];
                $validator = Validator::make($request->all(), $rules, [
                    'email.required' => 'Email is required',
                    'email.email' => 'Invalid email format',
                    'password.required' => 'Password is required',
                    'password.min' => 'Password must be at least 8 characters'
                ]);

                
                if($validator->fails()){
                    return resJson(false, $validator->errors()->first());
                }
                $result = $this->service->login($request->all());
                
                return resJson($result['status'], $result['msg'], null,$result['status']?$result['redirect']:'');
            }catch(\Exception $e){
                return resJson(false, $e->getMessage());
            }
        }

        // login view
        return view('admin.auth.login');
    }

    // logout system
    public function logout(Request $request){
        if($request->method() == 'POST' && $request->ajax()){
            try{
                // Logout user
                Auth::logout();

                // Invalidate session
                $request->session()->invalidate();

                // Regenerate CSRF token
                $request->session()->regenerateToken();
                return resJson(true, 'Logout successful', null, route('admin.auth.login'));
            }catch(\Exception $e){
                return resJson(false, $e->getMessage());
            }
        }
    }


}
