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
            $table->string('nim')->after('name');
            $table->unsignedBigInteger('id_prodi')->after('password');
            $table->string('semester')->after('id_prodi');

            $table->foreign('id_prodi')->references('id')->on('prodis')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['id_prodi']);
            $table->dropColumn('nim');
            $table->dropColumn('id_prodi');
            $table->dropColumn('semester');
        });
    }
};
