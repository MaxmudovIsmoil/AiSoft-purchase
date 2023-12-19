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
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->text('name');
            $table->integer('count')->default(0);
            $table->string('pcs')->default('')->comment('dona, karobka, штук');
            $table->string('capex')->default('');
            $table->string('purpose')->default('')->comment('maqsad');
            $table->string('address')->default('');
            $table->longText('comment')->default('');
            $table->string('project_price')->default('')->comment('taxminiy narx');
            $table->string('installation_time')->default('');
            $table->string('contract_number')->default('');
            $table->string('contract_date')->default('');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
            $table->softDeletes();
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_details');
    }
};
