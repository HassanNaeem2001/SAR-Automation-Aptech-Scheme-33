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
        Schema::create('batches', function (Blueprint $table) {
            $table->id();
            $table->string('BatchName');
            $table->integer('BatchTeacher');
            $table->foreign('BatchTeacher')->references('id')->on('teachers');
            $table->string('BatchTimings');
            $table->integer('BatchCF');
            $table->foreign('BatchCF')->references('id')->on('course_curricula');
            $table->integer('Batchstatus')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('batches');
    }
};
