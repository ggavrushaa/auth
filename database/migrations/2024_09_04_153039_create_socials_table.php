<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('socials', function (Blueprint $table) {
            $table->id()->from(1001);
            $table->uuid('uuid')->unique();
            $table->timestamps();

            $table->foreignId('user_id')->constrained()->nullable();
            $table->string('driver');
            $table->string('driver_user_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('socials');
    }
};
