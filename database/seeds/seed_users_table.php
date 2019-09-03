<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
class seed_users_table extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=>'zohaib', 
            'email'=>'zohaib_Ali204@yahoo.com', 
            'password'=>bcrypt('mypass'), 
            'remember_token'=>str::random(10), 
            'is_admin'=>true,
            'created_at'=>Carbon\Carbon::now() 
           
        ]); 
    }
}
