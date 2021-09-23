<?php

namespace App\Repository;

use App\Repository\RepositoryInterface;
use App\Models\Member;
use App\Models\User;
use App\Traits\ApiResponse;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthRepository extends BaseRepository implements RepositoryInterface
{
    use ApiResponse;
    protected $modelMember;
    protected $modelAdmin;

    public function __construct(Member $modelMember, User $modelAdmin)
    {
        $this->modelMember = $modelMember;
        $this->modelAdmin = $modelAdmin;
    }

    public function memberLogin($request)
    {
        try {
            $user = $this->modelMember->getModel()->where(['username' => $request->username])->first();
            if ($user) {
                if (Hash::check($request->password, $user->password)) {
                    $data = [
                        'user' => $user,
                        'token' => $user->createToken($user->id . '-' . $user->username)->accessToken
                    ];
                    return $this->okApiResponse($data);
                } else {
                    return $this->unauthorizedApiResponse($request->all(), 'Username atau password salah!');
                }
            } else {
                return $this->unauthorizedApiResponse($request->all(), 'Username atau password salah!');
            }
        } catch (QueryException $q) {
            return $this->badRequestApiResponse($q->error);
        }
    }

    public function adminLogin($request)
    {
        try {
            $user = $this->modelAdmin->getModel()->where(['username' => $request->username])->first();
            if ($user) {
                if (Hash::check($request->password, $user->password)) {
                    $data = [
                        'user' => $user,
                        'token' => $user->createToken($user->id . '-' . $user->username)->accessToken
                    ];
                    return $this->okApiResponse($data);
                } else {
                    return $this->unauthorizedApiResponse($request->all(), 'Username atau password salah!');
                }
            } else {
                return $this->unauthorizedApiResponse($request->all(), 'Username atau password salah!');
            }
        } catch (QueryException $q) {
            return $this->badRequestApiResponse($q->error);
        }
    }

    public function memberRegister($request)
    {
        try {
            $this->modelMember->create($request->all());
            return $this->okApiResponse($request->all(), 'Register berhasil');
        } catch (QueryException $q) {
            return $this->badRequestApiResponse($q->error);
        }
    }

    public function adminLogout()
    {
        try {
            Auth::guard('admin-api')->user()->tokens->each(function ($token, $key) {
                $token->delete();
            });
            return $this->okApiResponse([], 'Logout berhasil');
        } catch (QueryException $q) {
            return $this->badRequestApiResponse($q->error);
        }
    }

    public function memberLogout()
    {
        try {
            Auth::guard('member-api')->user()->tokens->each(function ($token, $key) {
                $token->delete();
            });
            return $this->okApiResponse([], 'Logout berhasil');
        } catch (QueryException $q) {
            return $this->badRequestApiResponse($q->error);
        }
    }
}