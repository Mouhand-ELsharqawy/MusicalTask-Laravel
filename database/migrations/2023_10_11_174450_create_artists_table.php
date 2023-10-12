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
        Schema::create('artists', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('middlename');
            $table->string('lastname');
            $table->string('nickname');
            $table->string('agentname');
            $table->string('agentofficelocation');
            $table->string('artistshowtype');
            $table->string('address');
            $table->string('city');
            $table->string('natinality');
            $table->double('age');
            $table->double('careerage');
            $table->double('salary');
            $table->string('phonenumber')->unique();
            $table->string('agentphonenumber')->unique();
            $table->string('whatsupnumber')->unique();
            $table->string('telephonenumber')->unique();
            $table->string('gmail')->unique();
            $table->string('facebook')->unique();
            $table->string('instagram')->unique();
            $table->string('twitter')->unique();
            $table->foreignId('shows_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artists');
    }
};
