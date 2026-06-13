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
        Schema::create('m_q_case_instances', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->float('team_points')->nullable();
            $table->foreignId('m_q_case_id')
                ->references('id')
                ->on('m_q_cases')
                ->onDelete('cascade');
            $table->foreignId('admin_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->foreignId('m_q_instance_state_id')
                ->references('id')
                ->on('m_q_instance_states')
                ->onDelete('no action');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_q_case_instances');
    }
};
