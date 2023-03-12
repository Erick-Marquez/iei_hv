<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //director
        User::create([
            'name' => 'Director',
            'email' => 'director@prueba.com',
            'email_verified_at' => now(),
            'password' => Hash::make('director'),
        ])->syncRoles(['Director']);

        //docente
        User::create([
            'name' => 'Docente',
            'email' => 'docente@prueba.com',
            'email_verified_at' => now(),
            'password' => Hash::make('docente'),
        ])->syncRoles(['Docente']);

        //alumnos
        User::create([
            'name' => 'Nathaly Gabriela Condori Maylle',
            'email' => 'condori@prueba.com',
            'email_verified_at' => now(),
            'password' => Hash::make('nathaly'),
        ])->syncRoles(['Alumno']);

        User::create([
            'name' => 'Michelle Ivette Contreras Torres',
            'email' => 'contreras@prueba.com',
            'email_verified_at' => now(),
            'password' => Hash::make('michelle'),
        ])->syncRoles(['Alumno']);

        User::create([
            'name' => 'Erick Alexander Marquez Galarza',
            'email' => 'marquez@prueba.com',
            'email_verified_at' => now(),
            'password' => Hash::make('erick'),
        ])->syncRoles(['Alumno']);
    }
}
