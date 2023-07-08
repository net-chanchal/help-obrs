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
        Schema::create('ebooks', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title')->unique();
            $table->string('slug')->unique();
            $table->string('writer');
            $table->string('publisher')->nullable();
            $table->string('edition')->nullable();
            $table->integer('pages')->nullable();
            $table->integer('price')->default(0);
            $table->string('language')->nullable()->default('English');
            $table->text('book_url');
            $table->longText('summary')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ebooks');
    }
};
