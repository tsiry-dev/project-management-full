<?php

namespace App\Http\Controllers;

use App\Actions\Members\MemberUpdateAction;
use App\Actions\Members\StoreMemberAction;
use App\Dtos\Members\MemberUpdateDTO;
use App\Dtos\Members\StoreDTO;
use App\Http\Requests\Members\MemberRequest;
use App\Http\Requests\Members\MemberUpdateRequest;
use Illuminate\Http\JsonResponse;

class MemberController extends Controller
{
    public function store(MemberRequest $request, StoreMemberAction $action): JsonResponse
    {
          $member = $action->handle(StoreDTO::fromArray($request->all()));

          return response()->json([
               'message' => 'Le membre a été créé avec succès',
               'member' => $member,
          ],201);
    }

    public function update(MemberUpdateRequest $request, MemberUpdateAction $action): JsonResponse
    {

        $action->handle($request->id, MemberUpdateDTO::fromArray($request->all()));

        return response()->json([
            'message' => 'Le membre a été modifié avec succès',
        ],201);
    }
}
