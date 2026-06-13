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
        Schema::create('m_q_user_answers', function (Blueprint $table) {
            $table->id();
            $table->string('answer');
            $table->integer('points')->nullable();
            $table->foreignId('m_q_question_id')
                ->references('id')
                ->on('m_q_questions')
                ->onDelete('cascade');
            $table->foreignId('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->foreignId('m_q_case_instance_id')
                ->references('id')
                ->on('m_q_case_instances')
                ->onDelete('cascade');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_q_user_answers');
    }
};
