<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::factory(20)->create();
        

        $users = User::all()->shuffle();

        for ($i=0; $i<100; $i++)
        {
            \App\Models\Transactions::factory()->create([
                'user_id'=> $users->random()->id,
                'payer_id'=> $users->random()->id
            ]);
        }
    }
}
