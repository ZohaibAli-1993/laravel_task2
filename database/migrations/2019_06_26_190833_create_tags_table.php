<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->bigIncrements('id'); 
            $table->string('name'); 
            $table->timestamps();
        }); 
         Schema::create('post_tag', function (Blueprint $table) {
            $table->integer('post_id');  
            $table->integer('tag_id'); 
           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {  
        Schema::dropIfExists('post_tag');
        Schema::dropIfExists('tags');
    }
}
