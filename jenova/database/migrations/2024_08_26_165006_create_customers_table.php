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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Changed from 'first_name' and 'last_name' to a single 'name' field
            $table->text('address'); // Changed from separate address fields to a single 'address' field
            $table->string('email'); // Added unique constraint for email
            $table->string('work_phone_no'); // Renamed from 'phone' to 'work_phone_no'
            $table->string('cell_no'); // Added 'cell_no' field
            $table->date('date_of_birth'); // Added 'date_of_birth' field
            $table->string('category'); // Added 'category' field
            $table->text('remarks')->nullable(); // Added 'remarks' field with nullable option
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
