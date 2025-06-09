<?php

namespace App\Http\Controllers\Auth;

use App\Actions\Auth\RegisterAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\UserResource;
use Illuminate\Http\JsonResponse;

class RegisterController extends Controller
{
    public function register(RegisterAction $action, RegisterRequest $request): JsonResponse
    {

        $user = $action->handle($request->validated());

        return Response()->json([
            'message' => 'Votre compte a été créé avec succès',
            'user' => new UserResource($user)
        ]);
    }
}
