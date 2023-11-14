<?php

namespace Database\Seeders;

use App\Models\usuario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i =0; $i < 100; $i++){
      usuario::create([
            'nome' => 'Manuzinha'.$i,
            'cpf' =>rand(00000000001, 99999999999),
            'celular' => '01987654321',
            'email' => 'Manuzinha'.$i.'sp@gmail.com',
            'password'=>Hash::make('654321') 
           ]);
        }    
    }
}
