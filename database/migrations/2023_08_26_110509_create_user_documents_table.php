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
        Schema::create('user_documents', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('adhar_card')->nullable();
            $table->string('pan_card')->nullable();
            $table->string('voter_card')->nullable();
            $table->string('standard_10_markshhet')->nullable();
            $table->string('standard_12_markshhet')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_documents');
    }
};
