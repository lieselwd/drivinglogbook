<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->enum('socialite_provider', \App\Enums\SocialiteProviders::cases())->nullable();
            $table->string('socialite_token', 10000)->nullable();
            $table->string('socialite_refresh_token', 10000)->nullable();
            $table->datetime('socialite_last_queried_at')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('socialite_provider');
            $table->dropColumn('socialite_token');
            $table->dropColumn('socialite_refresh_token');
            $table->dropColumn('socialite_last_queried_at');
        });
    }
};
