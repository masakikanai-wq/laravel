<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // if文を書くことでcommentsテーブルがないときだけ実行されるようになる
        if (!Schema::hasTable('comments')){
            Schema::create('comments', function (Blueprint $table) {
                $table->id();
                // post_idのデータ型とarticlesテーブルのidのデータ型を揃えないとmigrationできない
                $table->bigInteger('post_id');
                $table->text('body');
                $table->timestamps();
    
                // articlesテーブルのidとcommentsテーブルのpost_idを紐付ける記述？
                $table->foreign('post_id')->references('id')->on('articles');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
