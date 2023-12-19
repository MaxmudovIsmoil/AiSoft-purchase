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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('instance_id')->comment('qaysi instansiyaga tegishli');
            $table->unsignedBigInteger('current_instance_id')->comment('hozir qaysi instansiyada ketyapti');
            $table->string('current_stage')->nullable();
            $table->string('stage_count')->nullable();
            $table->enum('status', [0,1,2,3,4])->index()
                ->comment('0-create,1-processing,2-accepted,3-go back,4-declined');
            $table->string('comment')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict');
            $table->foreign('instance_id')->references('id')->on('instances')->onDelete('restrict');
            $table->foreign('current_instance_id')->references('id')->on('instances')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
