<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Course::create([ 'name' => 'Desarrollo personal, ciudadanía y cívica']);

        Course::create([ 'name' => 'Ciencias sociales']);

        Course::create([ 'name' => 'Educación fisica']);
    }
}
