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
            $table->string('name_en')->nullable();
            $table->string('name_ru')->nullable();
            $table->string('name_uz')->nullable();
            $table->string('status')->default(1);
            $table->string('time_line')->default(8);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            $table->softDeletes();
        });

        DB::table('instances')->insert([
            [
                "name_en" => 'Technical department',
                "name_ru" => 'Технический Отдел',
                "name_uz" => 'Texnik bo\'lim',
            ],
            [
                "name_en" => 'Marketing department',
                "name_ru" => 'Маркетинг центр',
                "name_uz" => 'marketing bo\'lim'
            ],
            [
                "name_en" => 'Financial department',
                "name_ru" => 'Финансовый Отдел',
                "name_uz" => 'Moliya bo\'lim',
            ],
            [
                "name_en" => 'Secretary',
                "name_ru" => 'Секретарь',
                "name_uz" => 'Kotiba',
            ],
            [
                "name_en" => 'Director',
                "name_ru" => 'Директор',
                "name_uz" => 'Direktor',
            ]
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
