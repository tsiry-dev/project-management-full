<?php

namespace App\Actions\Members;

use App\Dtos\Members\MemberUpdateDTO;
use App\Models\Member;
use App\Repositories\MemberRepository;

class MemberUpdateAction
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        protected MemberRepository $repository
    ){}

    public function handle(int $id, MemberUpdateDTO $data)
    {
         return $this->repository->update($id, $data);
    }
}
