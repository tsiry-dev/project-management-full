<?php

namespace App\Http\Controllers\Auth;

use App\Actions\Auth\RegisterAction;
use App\Actions\Auth\VerifyEmail;
use App\Dtos\Auth\RegisterUserData;
use App\Events\NewUserCreated;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class RegisterController extends Controller
{
    public function register(RegisterAction $action, RegisterRequest $request): JsonResponse
    {

        $user = $action->handle(RegisterUserData::fromArray($request->validated()));
        NewUserCreated::dispatch($user);

        return Response()->json([
            'message' => 'Votre compte a été créé avec succès,un email de vérification vous a été envoyé',
            'user' => new UserResource($user)
        ],201);
    }

    public function verifyEmail(VerifyEmail $action,string $token)
    {
        $action->handle($token);
        return redirect('/login');
    }
}
