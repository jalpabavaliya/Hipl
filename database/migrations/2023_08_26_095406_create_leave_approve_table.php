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
        Schema::create('leave_approve', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer('leave_id')->nullable();
            $table->integer('approver_by_manager')->nullable()->default(0);
            $table->integer('approver_by_hr')->nullable()->default(0);
            $table->integer('approve_by_admin')->nullable()->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leave_approve');
    }
};
