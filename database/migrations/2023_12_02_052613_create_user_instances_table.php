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
        Schema::create('user_instances', function (Blueprint $table) {
            $table->unsignedBigInteger('instance_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unique(['instance_id', 'user_id']);
            $table->foreign('instance_id')->references('id')->on('instances')->onDelete('restrict');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict');
        });

        DB::table('user_instances')->insert([
            [
                "user_id" => 2,
                "instance_id" => 1,
            ],
            [
                "user_id" => 3,
                "instance_id" => 2,
            ],
            [
                "user_id" => 4,
                "instance_id" => 3,
            ],
            [
                "user_id" => 5,
                "instance_id" => 4,
            ],
            [
                "user_id" => 6,
                "instance_id" => 5,
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_instances');
    }
};
