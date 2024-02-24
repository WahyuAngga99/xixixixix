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
        Schema::create('upload', function (Blueprint $table) {
            $table->id();
            $table->text('deskripsi')->nullable();
            $table->string('image');
            $table->text('name')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('album_id');
            $table->foreign('album_id')->references('id')->on('albums')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('upload', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
            $table->dropForeign(['album_id']);
            $table->dropColumn('album_id');
        });
    }
};
