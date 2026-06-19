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
        Schema::create('user_m_q_address_m_q_case_instance', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->foreignId('m_q_case_instance_id')
                ->references('id')
                ->on('m_q_case_instances')
                ->onDelete('cascade');
            $table->foreignId('m_q_address_id')
                ->references('id')
                ->on('m_q_addresses')
                ->onDelete('cascade');
            $table->timestamps();
            $table->unique(['user_id', 'm_q_case_instance_id', 'm_q_address_id'], 'user_instance_address_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_m_q_address_m_q_case_instance');
    }
};
