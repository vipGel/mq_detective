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
        Schema::create('m_q_questions', function (Blueprint $table) {
            $table->id();
            $table->string('question');
            $table->string('answer');
            $table->string('proof');
            $table->foreignId('case_id')
                ->references('id')
                ->on('m_q_cases')
                ->onDelete('cascade');
            $table->foreignId('question_priority_id')
                ->references('id')
                ->on('m_q_question_priorities')
                ->onDelete('no action');
            $table->integer('max_points');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_q_questions');
    }
};
