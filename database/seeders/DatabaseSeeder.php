<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        DB::table('roles')->insert([
            'nama' => 'Admin',
        ]);
        DB::table('roles')->insert([
            'nama' => 'Kaprodi',
        ]);
        DB::table('roles')->insert([
            'nama' => 'Dosen',
        ]);

        DB::table('users')->insert([
            'name' => 'Fedrick Siagian',
            'email' => 'superiorsiagian@gmail.com',
            'password' => Hash::make('qpwoei123'),
            'foto' => 'Foto2.jpg',
            'role'=>1,
        ]);

        DB::table('users')->insert([
            'name' => 'Hernawati Samosir',
            'email' => 'test@gmail.com',
            'password' => Hash::make('qpwoei123'),
            'foto' => 'foto.jpg',
            'role'=>2,
        ]);

        DB::table('users')->insert([
            'name' => 'Veronika Marpaung',
            'email' => 'vero@gmail.com',
            'password' => Hash::make('qpwoei123'),
            'foto' => 'foto.jpg',
            'role'=>3,
        ]);

        DB::table('users')->insert([
            'name' => 'Theresia Tampubolon',
            'email' => 'ecak@gmail.com',
            'password' => Hash::make('qpwoei123'),
            'foto' => 'foto.jpg',
            'role'=>3,
        ]);

        DB::table('users')->insert([
            'name' => 'Hansen Situmorang',
            'email' => 'hansen@gmail.com',
            'password' => Hash::make('qpwoei123'),
            'foto' => 'foto.jpg',
            'role'=>3,
        ]);

        DB::table('users')->insert([
            'name' => 'David Simatupang',
            'email' => 'david@gmail.com',
            'password' => Hash::make('qpwoei123'),
            'foto' => 'foto.jpg',
            'role'=>3,
        ]);
    }
}
