<?php

use Illuminate\Database\Seeder;

class seed_tags_table extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   DB::table('tags')->insert([
           'name'=>'php'
        ]); 
       
        DB::table('tags')->insert([ 
            'name'=>'ruby'
        ]); 
        DB::table('tags')->insert([ 
            'name'=>'python'
        ]); 
        DB::table('tags')->insert([
            'name'=>'java'
        ]); 
        DB::table('tags')->insert([
            'name'=>'javascript'
        ]); 
        DB::table('tags')->insert([
            'name'=>'ruby'
        ]); 
        ///pivot table 
        DB::table('post_tag')->insert([
            'post_id'=>1, 
            'tag_id'=>2
        ]); 
         DB::table('post_tag')->insert([ 
            'post_id'=>1, 
            'tag_id'=>3
        ]); 
          DB::table('post_tag')->insert([
            'post_id'=>1, 
            'tag_id'=>4
        ]); 
           DB::table('post_tag')->insert([ 
            'post_id'=>1, 
            'tag_id'=>5
        ]); 
            DB::table('post_tag')->insert([ 
            'post_id'=>1, 
            'tag_id'=>6
        ]);
    }
}
