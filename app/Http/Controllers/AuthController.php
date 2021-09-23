<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\Member;
use App\Models\User;
use App\Repository\AuthRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    private $authRepository;

    public function __construct(AuthRepository $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function memberLogin(LoginRequest $request)
    {
        return $this->authRepository->memberLogin($request);
    }

    public function adminLogin(LoginRequest $request)
    {
        return $this->authRepository->adminLogin($request);
    }

    public function memberRegister(RegisterRequest $request)
    {
        return $this->authRepository->memberRegister($request);
    }

    public function adminLogout()
    {
        return $this->authRepository->adminLogout();
    }

    public function memberLogout()
    {
        return $this->authRepository->memberLogout();
    }
}