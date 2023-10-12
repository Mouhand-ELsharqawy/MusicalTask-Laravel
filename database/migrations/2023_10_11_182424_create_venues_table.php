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
        Schema::create('venues', function (Blueprint $table) {
            $table->id();
            $table->string('city');
            $table->string('square');
            $table->string('street');
            $table->string('name');
            $table->string('locationingoogleearth');
            $table->double('capacity');
            $table->double('salaryperday');
            $table->string('locationmanagerfirstname');
            $table->string('locationmanagermiddlename');
            $table->string('locationmanagerlastname');
            $table->string('locationinmanagerphone');
            $table->string('locationinmanagertelephone');
            $table->string('locationintelephone');
            $table->foreignId('shows_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('venues');
    }
};
