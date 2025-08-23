<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [ 'name' => ' عبدالله باعبود', 'email' => 'admin@gmail.com', 'email_verified_at'=>'2022-05-14 19:25:19', 'password' => bcrypt('asdfasdf'),'type'=>'1'],
        ];
        User::insert($users);
        foreach (User::all() as $user) {
            $user->profile()->create([]);
            $user->address()->create([]);
        }
    }
}
