<?php

namespace Database\Seeders;

use App\Models\Member;
use App\Models\Project;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        Member::factory(10)->create();
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $projects = collect(       [
             [
                'name' => 'Corriger les bug',
                'slug' => 'corriger les bug',
                'status' => Project::NOT_STARTED,
                'start_date' => '2025-06-13',
                'end_date' => '2025-06-14',
            ],
            [
                'name' => 'Sécuriser l\'applicatiion',
                'slug' => 'securiser-l-application',
                'status' => Project::NOT_STARTED,
                'start_date' => '2025-06-13',
                'end_date' => '2025-06-14',
            ]
        ])->map(function($data) {
            return [
                'name' => $data['name'],
                'slug' => $data['slug'],
                'status' => 0,
                'start_date' => $data['start_date'],
                'end_date' => $data['end_date'],
            ];
        })->toArray();

       Project::insert($projects);
    }
}
