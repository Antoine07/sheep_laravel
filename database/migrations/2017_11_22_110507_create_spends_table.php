<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpendsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spends', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('spend_id')->nullable();
            $table->string('title');
            $table->text('description')->nullable();
            $table->decimal('price',7, 2)->nullable();
            $table->enum('status',['paid', 'account'])->default('paid');
            $table->foreign('spend_id')->references('id')->on('spends')->onDelete('CASCADE');
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
        Schema::dropIfExists('spends');
    }
}
