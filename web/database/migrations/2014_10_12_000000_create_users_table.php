<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('personaname', 50);
            $table->string('avatarfull', 150);
            $table->tinyInteger('rights')->default(0);
            $table->integer('likes_balance')->default(0);
            $table->decimal('wallet_balance', 10,2)->default(0.00);
            $table->decimal('wallet_total_refilled', 10,2)->default(0.00);
            $table->decimal('wallet_total_withdrawn', 10,2)->default(0.00);
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
