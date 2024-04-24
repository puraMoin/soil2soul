<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoleMenulinkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_menulink', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('role_id');
            $table->unsignedBigInteger('menulink_id');
            $table->timestamps();

            // Define foreign key constraints
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            $table->foreign('menulink_id')->references('id')->on('menulinks')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('role_menulink');
    }
}
