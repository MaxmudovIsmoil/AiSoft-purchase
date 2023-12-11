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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone')->nullable();
            $table->enum('rule', [1, 0])->default(0)->comment('1-admin,0-user');
            $table->string('username')->unique();
            $table->string('password');
            $table->string('photo')->nullable();
            $table->enum('status', [1, 0])->default(1)->comment('1 active, 0 no-active');
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
            $table->softDeletes();
        });

        DB::table('users')->insert([
            [
                "name" => 'Administrator',
                "phone" => '911234567',
                "username" => 'admin',
                "photo" => 'admin.png',
                "rule" => 1,
                "password" => \Illuminate\Support\Facades\Hash::make(123),
            ],
            [
                "name" => 'User',
                "phone" => '901234589',
                "username" => 'user',
                'photo' => 'user.png',
                'rule' => '0',
                "password" => \Illuminate\Support\Facades\Hash::make(123),
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
