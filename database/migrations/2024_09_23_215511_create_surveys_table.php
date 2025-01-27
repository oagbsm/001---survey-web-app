<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('surveys', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->string('title');
            $table->text('description');
            $table->integer('min_age');
            $table->integer('max_age');
            $table->enum('gender', ['male', 'female', 'other']);
            $table->string('region');
            $table->string('occupation');
            $table->timestamps();
    
            $table->foreign('customer_id')->references('id')->on('users')->onDelete('cascade');
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surveys');
    }
};
