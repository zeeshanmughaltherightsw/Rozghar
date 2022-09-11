<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100)->nullable();
            $table->string('slug', 100)->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->decimal('salary', 18,2)->nullable();  
            $table->string('education', 30)->nullable();  
            $table->integer('vacancy')->default(0);
            $table->unsignedBigInteger('city_id')->nullable();
            $table->string('note',1000)->nullable();
            $table->longText('description')->nullable();
            $table->string('link',500)->nullable();
            $table->string('image',500)->nullable();
            $table->enum('status',['active','inactive'])->default('active');
            $table->timestamp('last_date')->nullable();
            $table->timestamps();

            $table->foreign('category_id')->on('categories')->references('id')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('posts');
    }
}
