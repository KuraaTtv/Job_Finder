<?php

namespace Database\Seeders;

use App\Models\job;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $user = User::factory()->create([
            "name"=> "Ahmed",
            "email"=>"Ahmed@gmail.com"
        ]);
        job::factory(4)->create([
            "user_id"=> $user->id
        ]);
    }
}
