<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('entry_approvals', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('logbook_entry_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->boolean('approved')->default(true);
            $table->text('comments')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('entry_approvals');
    }
};
