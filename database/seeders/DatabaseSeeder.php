<?php

namespace Database\Seeders;

use App\Models\Advisor;
use App\Models\Course;
use App\Models\Student;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@domain.com',
            'password' => bcrypt('password!'),
        ]);

        Student::factory(10)->create();
        Advisor::factory(10)->create();
        Course::factory(10)->create();

    }
}
