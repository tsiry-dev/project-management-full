<?php

namespace App\Repositories;

use App\Dtos\Members\MemberUpdateDTO;
use App\Dtos\Members\StoreDTO;
use App\Models\Member;

class MemberRepository
{
    public function store(StoreDTO $data): Member
    {
         return Member::create([
            'name' => $data->name,
            'email' => $data->email,
         ]);
    }

    public function update(int $id, MemberUpdateDTO $data): void
    {
       Member::where('id', $id)->update([
        'name' => $data->name,
        'email' => $data->email,
       ]);
    }
}
