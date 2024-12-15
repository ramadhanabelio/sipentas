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
        Schema::table('facilities', function (Blueprint $table) {
            $table->unsignedBigInteger('id_laboratory')->nullable()->after('description');
            $table->foreign('id_laboratory')->references('id')->on('laboratories')->onDelete('set null');
            $table->dropColumn('location');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('facilities', function (Blueprint $table) {
            $table->string('location')->nullable();
            $table->dropForeign(['id_laboratory']);
            $table->dropColumn('id_laboratory');
        });
    }
};
