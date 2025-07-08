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
        Schema::create('wishlists', function (Blueprint $table) {
            
            $table->id();
            $table->unsignedBigInteger('productId');
            $table->unsignedBigInteger('customerId');
            $table->timestamps();
    
            // Foreign Key Constraints
            $table->foreign('productId')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('customerId')->references('id')->on('users')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wishlists');
    }
};
