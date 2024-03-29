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
        Schema::create('borrows', function (Blueprint $table) {
            $table->id('id');
            $table->string('borrow_code');
            $table->integer('user_id')->unique();
            $table->integer('book_id');
            $table->string('book_code');
            $table->date('borrow_date');
            $table->date('date_of_return');
            $table->integer('publication_year');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
            Schema::dropIfExists('borrows');
    }
};
