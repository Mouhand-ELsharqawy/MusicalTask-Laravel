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
        Schema::create('shows', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('spouncerfirstname');
            $table->string('spouncermiddlename');
            $table->string('spouncerlastname');
            $table->string('spouncerphone');
            $table->string('spouncerofficephone');
            $table->string('spouncergmail');
            $table->string('starttime');
            $table->string('endtime');
            $table->double('noramlticketsalary');
            $table->double('firstclassticketsalary');
            $table->double('attendancenumber');
            $table->double('fees');
            $table->double('artistsnumber');
            $table->string('showtype');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shows');
    }
};
