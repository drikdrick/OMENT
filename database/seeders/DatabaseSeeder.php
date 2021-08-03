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
            'name' => 'Admin',
            'email' => 'admin@oment.com',
            'password' => Hash::make('qpwoei123'),
            'foto' => 'Foto2.jpg',
            'role'=>1,
        ]);

        DB::table('users')->insert([
            'name' => 'Fedrick Sulaiman Siagian',
            'email' => 'superiorsiagian@gmail.com',
            'password' => Hash::make('qpwoei123'),
            'foto' => 'foto.jpg',
            'role'=>2,
        ]);

        DB::table('users')->insert([
            'name' => 'Veronika Marpaung',
            'email' => 'veronikaomrp@gmail.com',
            'password' => Hash::make('qpwoei123'),
            'foto' => 'foto.jpg',
            'role'=>3,
        ]);

        DB::table('users')->insert([
            'name' => 'Theresia Tampubolon',
            'email' => 'tereshajesika@gmail.com',
            'password' => Hash::make('qpwoei123'),
            'foto' => 'foto.jpg',
            'role'=>3,
        ]);

        DB::table('users')->insert([
            'name' => 'David Simatupang',
            'email' => 'if317049@students.del.ac.id',
            'password' => Hash::make('qpwoei123'),
            'foto' => 'foto.jpg',
            'role'=>3,
        ]);
    }
}
