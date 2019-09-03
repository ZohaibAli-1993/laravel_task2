<?php

use Illuminate\Database\Seeder;

class seeder_users_table extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('users')->insert([
            ''=>'Hello World!', 
            'slug'=>'hello-world', 
            'body'=>'<p><This is my first posts,written in a seeder</p>' , 
            'created_at'=>Carbon::now(),  
            'Updated_at'=>Carbon::now()
        ]); 
    }
}
