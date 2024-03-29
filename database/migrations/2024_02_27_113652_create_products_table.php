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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('emri');
            $table->text('komenti');
            $table->date('data_dorezimit');
            $table->integer('status')->default('0');
            $table->integer('cmimi_total')->default('0');
            $table->integer('cmimi_ofetuar')->default('0');
            $table->foreignId('user_id')
            ->nullable()
            ->references('id')->on('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
