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
        Schema::table('friend_requests', function (Blueprint $table) {
            $table->foreign('user_id', 'friend_requests_ibfk_2')->references('id')->on('users');
            $table->foreign('from_user_id', 'friend_requests_ibfk_3')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('friend_requests', function (Blueprint $table) {
            $table->dropForeign('friend_requests_ibfk_2');
            $table->dropForeign('friend_requests_ibfk_3');
        });
    }
};
