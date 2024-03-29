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
        Schema::create('ofertas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('emri');
            $table->integer('sasia');
            $table->text('komenti');
            $table->string('file');
            $table->text('info');
            $table->foreignId('products_id')
            ->nullable()
            ->references('id')->on('products')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->integer('status')->default(0);
            $table->text('status_comm')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ofertas');
    }
};
