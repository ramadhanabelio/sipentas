<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('laboratories', function (Blueprint $table) {
            $table->dropForeign(['id_facilities']);
            $table->dropColumn('id_facilities');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('laboratories', function (Blueprint $table) {
            $table->foreignId('id_facilities')->constrained('facilities')->onDelete('cascade');
        });
    }
};
