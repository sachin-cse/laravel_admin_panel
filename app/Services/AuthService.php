<?php

namespace App\Services;

use App\Contracts\AuthContract;

class AuthService
{
    //
    protected $repository;
    function __construct(AuthContract $repository)
    {
        $this->repository = $repository;
    }

    public function login(array $data){ 
        try{
           return $this->repository->login($data);
        }catch(\Exception $e){
            return resJson(false, $e->getMessage());
        }
        // return $this->repository->login($data);
    }
}