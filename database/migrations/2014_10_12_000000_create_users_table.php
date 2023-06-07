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
            $table->string('type'); //client, agent
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('middlename')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('phone_1')->unique()->nullable();
            $table->string('phone_2')->unique()->nullable();
            $table->unsignedBigInteger('agency_id')->nullable();
            $table->longText('address')->nullable();
            $table->boolean('isSuperAdmin')->default(false);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
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
