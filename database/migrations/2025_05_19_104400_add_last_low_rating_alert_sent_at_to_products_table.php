<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::table('products', function (Blueprint $table) {
        $table->timestamp('last_low_rating_alert_sent_at')->nullable();
    });
}

public function down()
{
    Schema::table('products', function (Blueprint $table) {
        $table->dropColumn('last_low_rating_alert_sent_at');
    });
}

};
