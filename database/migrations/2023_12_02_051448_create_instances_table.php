<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('instances', function (Blueprint $table) {
            $table->id();
            $table->string('name_ru');
            $table->string('status')->default(1);
            $table->string('time_line')->default(8);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            $table->softDeletes();
        });

        DB::table('instances')->insert([
            ["name_ru" => 'Технический Отдел'],
            ["name_ru" => 'Маркетинг центр'],
            ["name_ru" => 'Финансовый Отдел'],
            ["name_ru" => 'Секретарь'],
            ["name_ru" => 'Директор']
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instances');
    }
};
