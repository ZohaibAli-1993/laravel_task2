<?php

use Illuminate\Database\Seeder;
Use Carbon\Carbon;
class seed_posts_table extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'title'=>'Hello World!', 
            'slug'=>'hello-world', 
            'body'=>'<p><This is my first posts,written in a seeder</p>' ,  
            'category_id'=>3, 
            'user_id'=>1,
            'created_at'=>Carbon::now(),  
            'Updated_at'=>Carbon::now()
        ]); 
         DB::table('posts')->insert([
            'title'=>'My second Post!', 
            'slug'=>'my-second-post', 
            'body'=>'<p><This is my second posts,written in a seeder</p>' ,  
            'category_id'=>5, 
             'user_id'=>1,
            'created_at'=>Carbon::now(),  
            'Updated_at'=>Carbon::now()
        ]);
    }
}
