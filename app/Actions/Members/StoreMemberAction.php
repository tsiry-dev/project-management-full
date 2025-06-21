<?php

namespace App\Actions\Members;

use App\Dtos\Members\StoreDTO;
use App\Models\Member;
use App\Repositories\MemberRepository;

class StoreMemberAction
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        protected MemberRepository $repository
    ){}

    public function handle(StoreDTO $data): Member
    {
         return $this->repository->store($data);
    }
}
