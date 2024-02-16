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
        Schema::create('clubs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('user_id')->unique();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('affiliation_id');
            $table->foreign('affiliation_id')->references('id')->on('affiliations');
            $table->string('logo')->nullable();
            $table->string('trading_as')->nullable();
            $table->string('registration_number')->nullable();
            $table->string('vat_number')->nullable();
            $table->string('ncr_number')->nullable();
            $table->text('address')->nullable();
            $table->string('helpline')->nullable();
            $table->string('website')->nullable();
            $table->unsignedBigInteger('number_of_players')->default(0);
            $table->string('type')->nullable(); //  Non-profit Organization, Non-profit Company or Private Company
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clubs');
    }
};
