<?php

namespace App\Http\Controllers\Auth;

use App\Actions\Auth\LoginAction;
use App\Dtos\Auth\LoginUserDataDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Resources\UserResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(LoginRequest $request, LoginAction $action)
    {
        $result = $action->handle(LoginUserDataDTO::fromArray($request->all()));
        return response()->json([
            'message' => 'Authentification réussie',
            'user' => new UserResource($result['user']),
            'token' => $result['token']
        ]);

    }
}
