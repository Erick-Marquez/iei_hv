<?php

namespace Database\Seeders;

use App\Models\Grade;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Grade::create([ 'symbol' => '1°', 'name' => 'Primero']);
        Grade::create([ 'symbol' => '2°', 'name' => 'Segundo']);
        Grade::create([ 'symbol' => '3°', 'name' => 'Tercero']);
        Grade::create([ 'symbol' => '4°', 'name' => 'Cuarto']);
        Grade::create([ 'symbol' => '5°', 'name' => 'Quinto']);
    }
}
