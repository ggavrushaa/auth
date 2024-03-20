<?php

use App\Enums\PasswordStatusEnum;
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
        Schema::create('passwords', function (Blueprint $table) {
            $table->id()->from(1001);
            $table->uuid('uuid')->unique();
            $table->timestamps();

            $table->string('email');
            $table->foreignId('user_id')->nullable()->constrained();
            $table->string('status')->default(PasswordStatusEnum::pending->value);
            $table->string('ip');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('passwords');
    }
};
