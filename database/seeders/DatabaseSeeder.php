<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
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

        \App\Models\Campus::create([
            'name' => 'UC1'
        ]);
        \App\Models\Campus::create([
            'name' => 'UC2'
        ]);

        \App\Models\Shift::create([
            'name' => 'Morning'
        ]);
        \App\Models\Shift::create([
            'name' => 'Afternoon'
        ]);   \App\Models\Shift::create([
            'name' => 'Evening'
        ]);


        \App\Models\Major::create([
            'name' => 'Software engineering'
        ]);

        foreach(range(0,20) as $row){
            \App\Models\Student::create([
                'student_id' => Str::random(5),
                'phone' => fake()->phoneNumber(),
                'name' =>fake()->name(),
                'email' =>fake()->email(),
                'major_id' => 1,
                'sex' => random_int(1,2),
                'campus_id' => 1,
                'shift_id' => random_int(1,3),
                'dob' => fake()->date(),
                'pob' => fake()->address(),
            ]);
        }
        

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
