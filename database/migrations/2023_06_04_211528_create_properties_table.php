<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('for_what'); //sale, rent, lease
            $table->unsignedBigInteger('category_id')->nullable(); //property-type
            $table->decimal('price', 18, 2); // Example of an amount column with 10 digits and 2 decimal places
            // $table->string('area')->nullable(); //hectares
            // $table->string('year_built')->nullable();
            $table->json('property_features')->nullable();

            //location
            $table->text('address')->nullable();
            $table->text('city')->nullable();
            $table->text('state')->nullable();
            $table->text('zipcode')->nullable();
            $table->json('landmarks')->nullable();

            $table->longText('description')->nullable();

            $table->json('images')->nullable();
            $table->string('featured_image')->nullable();

            $table->json('videos')->nullable();
            $table->json('youtube_videos')->nullable();
            $table->json('vimeo_videos')->nullable();
            $table->string('featured_video')->nullable();

            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('agent_id')->nullable();
            $table->longText('tags')->nullable();
            $table->string('status')->nullable(); //pending, active
            $table->boolean('isFeatured')->nullable(); //show in landing pg

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
