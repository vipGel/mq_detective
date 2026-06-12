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
        Schema::create('m_q_tips', function (Blueprint $table) {
            $table->id();
            $table->string('hint');
            $table->string('clue');
            $table->integer('time');
            $table->foreignId('case_id')
                ->references('id')
                ->on('m_q_cases')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_q_tips');
    }
};
