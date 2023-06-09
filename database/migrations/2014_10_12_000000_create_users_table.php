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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('unique_key')->unique();
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('middlename')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('password')->nullable();

            $table->string('type'); //client, agent
            $table->string('profile_picture')->nullable();
            
            $table->string('phone_1')->unique()->nullable();
            $table->string('phone_2')->unique()->nullable();
            $table->unsignedBigInteger('agency_id')->nullable();
            $table->longText('address')->nullable();
            $table->boolean('isSuperAdmin')->default(false);
            $table->longText('facebook_link')->nullable();
            $table->longText('whatsapp_link')->nullable();
            $table->longText('instagram_link')->nullable();
            $table->longText('twitter_link')->nullable();
            $table->longText('telegram_link')->nullable();
            $table->string('status')->nullable(); //pending, approved
            $table->timestamp('email_verified_at')->nullable();
            
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
