<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::table('blogs', function (Blueprint $table) {
        $table->unsignedInteger('likes_count')->default(0);
        $table->unsignedInteger('dislikes_count')->default(0);
    });
}

public function down()
{
    Schema::table('blogs', function (Blueprint $table) {
        $table->dropColumn(['likes_count', 'dislikes_count']);
    });
}

};
