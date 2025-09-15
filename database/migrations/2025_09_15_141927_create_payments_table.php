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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('payment_number')->unique();
            $table->string('payment_method');
            $table->decimal('payment_amount', 15 ,2);
            $table->datetime('payment_date');
            $table->boolean('is_approved')->default(false);
            $table->enum('status', ['PENDING','SUCCESS'])->default('PENDING');

            // RELATIONS
            $table->foreignId('bill_id')
                ->nullable()
                ->constrained('bills')
                ->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
