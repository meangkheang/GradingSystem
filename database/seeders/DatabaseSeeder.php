<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Score;
use App\Models\Subject;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //types
        \App\Models\Type::create([
            'name' => 'Admin'
        ]);
        \App\Models\Type::create([
            'name' => 'Teacher'
        ]); \App\Models\Type::create([
            'name' => 'User'
        ]);
        


        //create campus
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


        //creat major
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
        

        //create subject
        \App\Models\Subject::create([
            'major_id' => 1,
            'name' => 'C#',
        ]);

        \App\Models\Subject::create([
            'major_id' => 1,
            'name' => 'Java',
        ]);

        \App\Models\Subject::create([
            'major_id' => 1,
            'name' => 'System Analyze',
        ]);

        foreach(range(0,20) as $index =>  $row){
            $class_participation = random_int(5,10);
            $hw = random_int(2,4);
            $midterm = random_int(3,5);
            $slidehandbook = random_int(8,12);
            $student_id = random_int(1,11);
            $major_assignment = random_int(5,20);
            $presentation = random_int(5,12);
            $final = random_int(12,20);
            $score_tag = Str::random(6);
            $total = $class_participation + $hw + $midterm + $slidehandbook + $major_assignment + $presentation + $final;
    
            \App\Models\Score::create([
                'class_participation' =>  $class_participation,
                'hw' => $hw,
                'midterm' => $midterm,
                'slidehandbook' => $slidehandbook,
                'student_id' => $student_id,
                'score_tag' => $score_tag,
                'major_assignment' => $major_assignment,
                'presentation' => $presentation,
                'final' =>$final,
                'total' => $total
            ]);


            //store score with subject in scoresubject table
            \App\Models\ScoreSubject::create([
                'subject_id' => random_int(1,3),
                'score_id' => $index+1,
                'shift_id' => random_int(1,3),
                'grade' => Score::find($index+1)->CalculateGrade()
            ]);
        }
        
        //create users

        \App\Models\User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('secret'), 
        ]);

        \App\Models\User::create([
            'name' => 'teacher',
            'email' => 'teacher@teacher.com',
            'password' => Hash::make('secret'), 
        ]);

        \App\Models\User::create([
            'name' => 'user',
            'email' => 'user@user.com',
            'password' => Hash::make('secret'), 
        ]);

        \App\Models\UserType::create([
            'type_id' => 1,
            'user_id' => 1
        ]);  
        \App\Models\UserType::create([
            'type_id' => 2,
            'user_id' => 2
        ]);  
        \App\Models\UserType::create([
            'type_id' => 3,
            'user_id' => 3
        ]);  

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
