<?php


use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Eleanor Tefera',
                'email'          => 'eleanortefera12@gmail.com',
                'password'       => bcrypt('123Admin24'),
                'remember_token' => null,
            ],
        ];

        User::insert($users);
    }
}
