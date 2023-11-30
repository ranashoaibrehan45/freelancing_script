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
        Schema::create('lengths', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('note')->nullable();
            $table->bigInteger('size_id')
                ->default(0)
                ->comment('skip this project size and show all other on frontend');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lengths');
    }
};
