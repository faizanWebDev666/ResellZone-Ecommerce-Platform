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
        Schema::create('sellers_registrations', function (Blueprint $table) {
            $table->id();
        
            // 🔑 Link to users table
            $table->unsignedBigInteger('user_id');
        
            $table->string('name');
            $table->string('store_name')->unique();
            $table->string('email')->unique();
            $table->string('contact');
            $table->text('address');
        
            $table->enum('status', ['pending', 'approved'])->default('pending');
        
            $table->timestamps();
        
            // Optional: foreign key constraint to users table
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sellers_registrations');
    }
};
