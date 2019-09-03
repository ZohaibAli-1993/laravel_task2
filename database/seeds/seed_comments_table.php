<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class seed_comments_table extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          DB::table('comments')->insert([
            'user_id'=>3 ,
            'post_id'=>1,  
            'body'=>'My first Comment',
            'created_at'=>Carbon::now(),  
            'Updated_at'=>Carbon::now()
        ]); 
            DB::table('comments')->insert([
            'user_id'=>2 ,
            'post_id'=>1,  
            'body'=>'My first Comment1',
            'created_at'=>Carbon::now(),  
            'Updated_at'=>Carbon::now()
        ]); 
             DB::table('comments')->insert([
            'user_id'=>4 ,
            'post_id'=>1,  
            'body'=>'My first Comment2',
            'created_at'=>Carbon::now(),  
            'Updated_at'=>Carbon::now()
        ]); 
                DB::table('comments')->insert([
            'user_id'=>5 ,
            'post_id'=>1,  
            'body'=>'My first Comment2',
            'created_at'=>Carbon::now(),  
            'Updated_at'=>Carbon::now()
        ]);
    }
}
