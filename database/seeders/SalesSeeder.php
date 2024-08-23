<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SalesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'id' => '9',
                'nama' => 'Edy Sudrajat PSC',
                'email' => 'edy@gmail.com',
                'password' => bcrypt('edypsc2024'),
                'id_level' => '6'
            ],
            [
                'id' => '10',
                'nama' => 'Harry Rusli PSC',
                'email' => 'harry@gmail.com',
                'password' => bcrypt('harrypsc2024'),
                'id_level' => '6'
            ],
            [
                'id' => '11',
                'nama' => 'Gunadi PSC',
                'email' =>'gunadi@gmail.com',
                'password' => bcrypt('gunadicpscbeton'),
                'id_level' => '6'
            ],
            [
                'id' => '12',
                'nama' => 'Dealer PSC',
                'email' => 'dealer@gmail.com',
                'password' => bcrypt('dealerpscbeton'),
                'id_level' => '6'
            ],
        ];

        foreach ($users as $key => $value) {
            User::create($value);
        }
    }
}
