<?php

namespace App\Repositories;

use App\Contracts\AuthContract;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthRepository implements AuthContract
{

    protected $model;
    public function __construct()
    {
        $this->model = app($this->model());
    }

    // call the model
    public function model(){
        return User::class;
    }
    //login 
    public function login(array $data){
        try{
            // check exist or not user
            $user = $this->model->where('email', $data['email'])->first();

            if(!$user){
                return [
                    'status'=>false,
                    'msg' => 'Email does not exist'
                ];
            }

            if(!Hash::check($data['password'], $user->password)){
                // return resJson(false, 'Invalid password');
                return [
                    'status'=>false,
                    'msg' => 'Invalid password'
                ];
            }

            Auth::login($user);

            // return resJson(true, 'Login successful');
            return [
                'status'=>true,
                'msg' => 'Login successful',
                'redirect' => route('admin.dashboard')
            ];

        }catch(\Exception $e){
            return resJson(false, $e->getMessage());
        }
    }
}