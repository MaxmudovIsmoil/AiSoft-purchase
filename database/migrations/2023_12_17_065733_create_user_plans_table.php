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
        Schema::create('user_plans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('user_instance_id'); // user_instance --> instance_id
            $table->unsignedBigInteger('instance_id');
            $table->integer('stage')->nullable();
            $table->enum('status', [0, 1])->default(0);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('user_instance_id')->references('id')->on('instances')->onDelete('restrict');
            $table->foreign('instance_id')->references('id')->on('instances')->onDelete('restrict');
        });

        \Illuminate\Support\Facades\DB::table('user_plans')->insert([
            [
                'user_id' => 2,
                'user_instance_id' => 1,
                'instance_id' => 2,
                'stage' => 1,
            ],
            [
                'user_id' => 2,
                'user_instance_id' => 1,
                'instance_id' => 3,
                'stage' => 2,
            ],
            [
                'user_id' => 2,
                'user_instance_id' => 1,
                'instance_id' => 4,
                'stage' => 3,
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_plans');
    }

};
