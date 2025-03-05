<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('image')->nullable()->default('https://img.freepik.com/free-vector/illustration-user-avatar-icon_53876-5907.jpg?t=st=1738749045~exp=1738752645~hmac=77d761762c7f64d90ecd819f8ed2a571dc3c661a5a05724f0d7bd0eb5df82c42&w=826');
            $table->string('price')->nullable();
            $table->string('bio')->nullable();
            $table->string('bioGraphy')->nullable();
            $table->string('phoneNumber')->nullable();
            $table->string('major')->nullable();
            $table->string('country')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
