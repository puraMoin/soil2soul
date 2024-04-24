<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
    {
        Schema::create('menu_links', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('url');
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->foreign('parent_id')->references('id')->on('menu_links')->onDelete('cascade');
            $table->unsignedInteger('lft')->index();
            $table->unsignedInteger('rght')->index();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('menu_links');
    }
}
