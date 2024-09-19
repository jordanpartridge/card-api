<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('decks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->tinyInteger('jokers')->comment('The number of jokers in the deck')->default(0);
            $table->timestamp('updated_at')->useCurrentOnUpdate();
            $table->timestamp('created_at')->useCurrent();
            $table->softDeletes();
            $table->unique(['name']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('decks');
    }
};
