<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('from_id');
            $table->foreign('from_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('to_id');
            $table->foreign('to_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('id_user_remove')->nullable();
            $table->foreign('id_user_remove')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('id_group_chat')->nullable();
            $table->foreign('id_group_chat')->references('id')->on('group_chats')->onDelete('cascade');
            $table->text('message')->nullable();
            $table->string('image')->nullable();
            $table->integer('remove')->default(0);
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
        Schema::dropIfExists('messages');
    }
}
