<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('m_q_cases', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->mediumText('briefing');
            $table->mediumText('debriefing');
            $table->foreignId('m_q_genre_id')
                ->references('id')
                ->on('m_q_genres')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_q_cases');
    }
};
