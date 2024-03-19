<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laptops', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('ram');
            $table->string('processor');
            $table->string('wversion');
            $table->integer('price');
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
        //here if you want to do column changes like its type,properties etc.. do here (chatgpt method)
        // Schema::table('laptops', function (Blueprint $table) {
        //     $table->integer('ram')->unsigned()->change();
        // });
        //above method is not working
        Schema::dropIfExists('laptops');
    }
};
