<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\Petugas;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Petugas::create([
        'nama_petugas' => 'Administator',
        'username' => 'admin',
        'password' => Hash::make('password'),
        'telp'=> '082146568288',
        'level' => 'admin',
        ]);    
    }
}
