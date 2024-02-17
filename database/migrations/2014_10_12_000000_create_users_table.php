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
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('phone_number')->unique();
            $table->string('photo')->nullable();
            $table->string('passport_number')->nullable();
            $table->date('passport_date_of_issue')->nullable();
            $table->string('surname')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->string('nationality')->nullable();
            $table->enum('gender', ['Male', 'Female', 'Others'])->nullable();
            $table->enum('role', ['user', 'club', 'admin'])->default('user'); // admin, user
            $table->enum('status', ['active', 'inactive'])->default('active'); // active, inactive
            $table->enum('club_status', ['Coach', 'Player', 'Supporter'])->nullable(); // coach, player, supporter
            $table->unsignedBigInteger('affiliation_id')->nullable();
            $table->unsignedBigInteger('badge_id')->nullable(); // bronze, silver, gold, platinum
            $table->unsignedBigInteger('star')->default(0);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
