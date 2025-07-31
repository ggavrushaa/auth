<?php

use App\Enums\Logins\LoginStatusEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('logins', function (Blueprint $table) {
            $table->id()->from(1001);
            $table->uuid('uuid')->unique();
            $table->timestamps();

            $table->foreignId('user_id')->nullable()->constrained();
            $table->string('status');
            $table->string('email');
            $table->boolean('remember')->default(false);
            $table->string('agent');
            $table->string('ip');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('logins');
    }
};
