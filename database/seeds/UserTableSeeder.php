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

        \DB::transaction(function(){
            try{
                for($i=1; $i<=100; $i++) {
                    DB::table('users')->insert([
                        'name' => "langzi".$i++,
                        'password' => "123456",
                        'email' => "1160735344".$i++."@qq.com",
                        'created_at' => Carbon::now()
                    ]);
                }
            }catch(\Exception $e){
                Log::error($e->getMessage());
                throw $e;
            }

        });

    }
}
