<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->string('name')->nullable();
            $table->string('category')->nullable();
            $table->string('type')->nullable();
            $table->string('condition')->nullable();
            $table->string('location')->nullable();
            $table->string('city')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('wifi_availability')->nullable();

            $table->string('body_type')->nullable();
            $table->string('transmission')->nullable();
            $table->string('fuel_type')->nullable();
            $table->string('color_options')->nullable();
            $table->string('seats')->nullable();

            $table->string('features')->nullable();
            $table->string('register_city')->nullable();
            $table->string('car_documents')->nullable();
            $table->string('assembly_type')->nullable();
            $table->string('km_driven')->nullable();
            $table->string('make')->nullable();

            $table->string('model')->nullable();
            $table->string('brand')->nullable();
            $table->string('screen_size')->nullable();
            $table->string('resolution')->nullable();
            $table->string('power_source')->nullable();
            $table->string('capacity')->nullable();
            $table->string('load_type')->nullable();
            $table->string('wifi')->nullable();
            $table->string('voltage')->nullable();
            $table->string('wattage')->nullable();

            $table->string('numTaps')->nullable();
            $table->string('refrigerator')->nullable();
            $table->string('musical_instruments')->nullable();
            $table->string('gym_and_fitness')->nullable();
            $table->string('kids_bath_diaper')->nullable();
            $table->string('kid_accessories')->nullable();
            $table->string('kids_toys')->nullable();
            $table->string('camera_installation')->nullable();
            $table->string('table_dinning')->nullable();

            $table->string('item')->nullable();
            $table->string('householdSubtypeSelection')->nullable();
            $table->string('officefurnituresubtypeSelection')->nullable();

            $table->string('screenSize')->nullable();
            $table->string('powerSource')->nullable();
            $table->string('loadType')->nullable();

            // Add the price column here
            $table->decimal('price', 10, 2)->nullable();  // Assuming price is a decimal with 2 decimal places
            $table->enum('subtype_office', ['desk', 'chair', 'cabinet', 'table', 'shelf', 'others'])->nullable();
            $table->enum('sport_type', ['team-sport', 'individual-sport', 'outdoor', 'indoor', 'water-sport'])->nullable();
            $table->string('subcategory')->nullable();
            
            
            $table->string('subtype')->nullable();
            $table->string('furniture_type')->nullable();
            
            $table->string('job_type')->nullable();
            $table->string('jobSubcategory')->nullable();

            
            $table->string('property_type')->nullable(); // residential, commercial, land, industrial
            $table->string('book_title')->nullable();  // Book Title (Nullable)
            $table->string('author')->nullable();  // Author (Nullable)
            $table->enum('language', ['English', 'Urdu', 'Arabic', 'French', 'Other'])->default('English')->nullable();
            $table->string('breed')->nullable(); // Breed can be null
            $table->enum('sex', ['male', 'female', 'pair'])->nullable(); // Sex can be null
            $table->integer('age')->nullable(); // Age can be null
                         // e.g., Dell, HP
            $table->string('processor')->nullable();           // e.g., Intel i5, Ryzen 7
            $table->string('ram')->nullable();                 // e.g., 8GB, 16GB
            $table->string('storage')->nullable();  
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
        Schema::dropIfExists('products');
    }
};
