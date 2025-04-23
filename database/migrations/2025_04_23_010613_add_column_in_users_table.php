<?php

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
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('blocked')
                ->default(false)
                ->after('remember_token');
                
            $table->enum('role', ['Admin','User'])
                ->default('User')
                ->after('blocked');

            $table->string('phone')
                ->nullable()
                ->after('role');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('blocked');
            $table->dropColumn('role');
            $table->dropColumn('phone');
        });
    }
};
