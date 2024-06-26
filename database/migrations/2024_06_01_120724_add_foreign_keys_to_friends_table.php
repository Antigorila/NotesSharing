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
        Schema::table('friends', function (Blueprint $table) {
            $table->foreign('user_id', 'friends_ibfk_2')->references('id')->on('users');
            $table->foreign('friend_id', 'friends_ibfk_3')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('friends', function (Blueprint $table) {
            $table->dropForeign('friends_ibfk_2');
            $table->dropForeign('friends_ibfk_3');
        });
    }
};
