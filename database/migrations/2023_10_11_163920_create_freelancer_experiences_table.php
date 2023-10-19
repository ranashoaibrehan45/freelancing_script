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
        Schema::create('freelancer_experiences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('title');
            $table->string('company');
            $table->string('location')->nullable();
            $table->biginteger('country_id')->nullable();
            $table->tinyInteger('start_month');
            $table->smallInteger('start_year');
            $table->tinyInteger('end_month')->nullable();
            $table->smallInteger('end_year')->nullable();
            $table->tinyInteger('continue')->default(0);
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('freelancer_experiences');
    }
};
