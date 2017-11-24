<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpendUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spend_user', function (Blueprint $table) {
            $table->unsignedInteger('spend_id');
            $table->unsignedInteger('user_id')->nullable();
            $table->decimal('price',7, 2);
            $table->unique(['spend_id', 'user_id']);
            $table->foreign('spend_id')->references('id')->on('spends')->onDelete('CASCADE');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('spend_user');
    }
}
