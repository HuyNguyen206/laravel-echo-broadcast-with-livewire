<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


//Tinker away!
        $huy = \App\Models\User::factory()->create([
            'name' => 'huy',
            'email' => 'nguyenlehuyuit@gmail.com'
        ]);
        $nam = \App\Models\User::factory()->create([
            'name' => 'nam',
            'email' => 'nam@gmail.com'
        ]);
        \App\Models\User::factory(5)->create();

        $huyProject = \App\Models\Project::factory()->create(['title' => 'Huy Family', 'user_id' => $huy->id]);

        $huyProject->users()->attach([$huy->id, $nam->id]);


        \App\Models\Project::factory()->create(['title' => 'Nam Family', 'user_id' => $nam->id]);

    }
}
