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
        Schema::create('expenses', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('user_id')->constrained()->onDelete('cascade');
            $table->foreignUuid('type_detail_id')->nullable()->constrained('budgets')->onDelete('cascade');
            $table->foreignUuid('payment_id')->nullable()->constrained('payments')->onDelete('cascade');
            $table->date('date');
            $table->string('description');
            $table->unsignedInteger('nominal')->default(0);
            $table->string('type');
            $table->string('month');
            $table->unsignedSmallInteger('year');
            $table->string('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenses');
    }
};
