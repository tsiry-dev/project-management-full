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
        Schema::create('task_members', function (Blueprint $table) {
            $table->id();

            $table->foreignId('project_id');
            $table->foreign('project_id')
                  ->references('id')
                  ->on('projects')
                  ->cascadeOnDelete();

            $table->foreignId('task_id');
            $table->foreign('task_id')
                  ->references('id')
                  ->on('tasks')
                  ->cascadeOnDelete();

            $table->foreignId('member_id');
            $table->foreign('member_id')
                  ->references('id')
                  ->on('members')
                  ->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('task_members');
    }
};
