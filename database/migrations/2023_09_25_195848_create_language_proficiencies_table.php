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
        Schema::create('language_proficiencies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->timestamps();
        });

        DB::table('language_proficiencies')->insert([
            [
                'name' => 'Basic',
                'description' => 'I am only able to communicate in this language through written communication',
            ],
            [
                'name' => 'Conversational',
                'description' => 'I know this language well enough to verbally discuss project details with a client',
            ],
            [
                'name' => 'Fluent',
                'description' => 'I have complete command of this language with perfect grammar',
            ],
            [
                'name' => 'Native or Bilingual',
                'description' => 'I have complete command of this language, including breadth of vocabulary, idioms, and colloquialisms',
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('language_proficiencies');
    }
};
