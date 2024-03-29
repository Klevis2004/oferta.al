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
        Schema::create('preferencats', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('wish')->default(0);
            $table->foreignId('user_id')
            ->nullable()
            ->references('id')->on('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreignId('artikujs_id')
            ->nullable()
            ->references('id')->on('artikujs')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('preferencats');
    }
};
