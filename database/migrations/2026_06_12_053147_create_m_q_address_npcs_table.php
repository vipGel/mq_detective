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
        Schema::create('m_q_address_npcs', function (Blueprint $table) {
            $table->id();
            $table->string('information');
            $table->string('application_path')->nullable();
            $table->foreignId('m_q_address_id')
                ->references('id')
                ->on('m_q_addresses')
                ->onDelete('cascade');
            $table->foreignId('m_q_case_id')
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
        Schema::dropIfExists('m_q_address_npcs');
    }
};
