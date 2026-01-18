<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->json('registration');
            $table->json('registration_history')->nullable();
            $table->string('vin')->nullable();
            $table->string('model_year')->nullable();
            $table->string('make');
            $table->string('model');
            $table->string('nickname');
            $table->foreignId('user_id')->index()->constrained('users');
            $table->enum('transmission', \App\Enums\TransmissionTypes::cases())->nullable();
            $table->longText('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
