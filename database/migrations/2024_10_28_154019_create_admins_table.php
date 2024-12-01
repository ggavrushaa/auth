<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id()->from(1001);
            $table->timestamps();
            
            $table->string('name')->nullable()->comment('Имя');
            $table->string('email')->unique()->nullable();
            
            $table->string('password');
            $table->rememberToken();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};