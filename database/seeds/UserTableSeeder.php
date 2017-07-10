<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $users = [
            [
                'username' => '浪子2275',
                'email' => '2275906593@qq.com',
                'age' => 20
            ],
            [
                'username' => '浪子1160',
                'email' => '1160735344@qq.com',
                'age' => 25
            ]
        ];

        \DB::transaction(function() use ($users) {
            try{
                array_walk($users, function($user){
                    DB::table('user')->insert([
                        'username' => $user['username'],
                        'email' => $user['email'],
                        'age' => $user['age'],
                        'created_at' => Carbon::now()
                    ]);
                });
            }catch(\Exception $e){
                Log::error($e->getMessage());
                throw $e;
            }

        });

    }
}
