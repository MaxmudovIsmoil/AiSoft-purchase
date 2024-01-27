<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone')->nullable();
            $table->enum('rule', [1, 0])->default(0)->comment('1-Admin,0-user');
            $table->string('username')->unique();
            $table->string('password');
            $table->string('photo')->nullable();
            $table->enum('status', [1, 0])->default(1)->comment('1 active, 0 no-active');
            $table->enum('locale', ['ru', 'en', 'uz'])->default('ru');
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            $table->softDeletes();
        });

        DB::table('users')->insert([
            [
                "name" => 'Administrator',
                "phone" => '911234567',
                "username" => 'Admin',
                "photo" => 'Admin.png',
                "rule" => 1,
                "password" => Hash::make(123),
            ],
            [
                "name" => 'Texnik',
                "phone" => '901234512',
                "username" => 'texnik',
                'photo' => 'user.png',
                'rule' => '0',
                "password" => Hash::make(123),
            ],
            [
                "name" => 'Marketing',
                "phone" => '901234514',
                "username" => 'market',
                'photo' => 'user.png',
                'rule' => '0',
                "password" => Hash::make(123),
            ],
            [
                "name" => 'Finance',
                "phone" => '901001133',
                "username" => 'finance',
                'photo' => 'user.png',
                'rule' => '0',
                "password" => Hash::make(123),
            ],
            [
                "name" => 'Secretary',
                "phone" => '905037154',
                "username" => 'secretary',
                'photo' => 'user.png',
                'rule' => '0',
                "password" => Hash::make(123),
            ],
            [
                "name" => 'Director',
                "phone" => '903401971',
                "username" => 'bos',
                'photo' => 'user.png',
                'rule' => '0',
                "password" => Hash::make(123),
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
