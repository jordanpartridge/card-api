<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('suits', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->char('symbol', 1)->unique();
            $table->string('unicode', 4);
            $table->string('color', 7);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('suits');
    }
};
