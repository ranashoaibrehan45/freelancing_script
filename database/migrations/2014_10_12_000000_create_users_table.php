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
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('phone')->unique()->nullable();
            $table->timestamp('phone_verified_at')->nullable();
            $table->string('password');
            $table->enum('role', ['client','freelancer','manager','admin'])->default('client');
            $table->string('photo')->nullable();
            $table->string('address')->nullable();
            $table->biginteger('city_id')->nullable();
            $table->biginteger('state_id')->nullable();
            $table->string('zipcode')->nullable();
            $table->biginteger('country_id')->nullable();
            $table->biginteger('timezone')->nullable();
            $table->enum('status', ['active','inactive','rejected','freezed']);
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
