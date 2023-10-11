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
        Schema::create('freelancer_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->tinyInteger('find_work')->default(0);
            $table->tinyInteger('sale_services')->default(0);
            $table->enum('profile', [
                'pending',
                'start',
                'experience_level',
                'goal',
                'how_to_work',
                'title',
                'experience',
                'education',
                'languages',
                'skills',
                'bio',
                'services',
                'hourly_rate',
                'details',
                'completed',
            ])->default('pending');
            $table->string('title')->nullable();
            $table->text('bio')->nullable();
            $table->double('rate', 8, 2)->default(0);
            $table->enum('experience_level', [
                'Entry level','Intermediate','Expert'
            ])->nullable();
            $table->enum('goal', [
                'To earn my main income',
                'To make money on the side',
                'To get experience, for a full-time job',
                'I don\'t have a goal in mind yet'
            ])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('freelancer_profiles');
    }
};
