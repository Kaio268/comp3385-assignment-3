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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Column for the client's name
            $table->string('email')->unique(); // Column for the client's email with a unique constraint
            $table->string('telephone'); // Column for the client's telephone number
            $table->text('address'); // Column for the client's address
            $table->string('company_logo')->nullable(); // Column for the path and filename of the company logo, which can be nullable
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
