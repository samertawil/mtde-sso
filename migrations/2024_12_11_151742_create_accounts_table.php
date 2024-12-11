<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->integer('idc')->unique();
            $table->string('user_name')->unique();
            $table->string('full_name')->unique();
            $table->integer('provider')->nullable();
            $table->string('mobile')->unique();
            $table->string('email')->nullable();
            $table->foreignId('status_id')->nullable();
            $table->enum('user_type', ['user', 'employee', 'admin', 'superadmin'])->default('user');
            $table->enum('user_activation', [0, 1])->default(1);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('accounts');
    }
};
