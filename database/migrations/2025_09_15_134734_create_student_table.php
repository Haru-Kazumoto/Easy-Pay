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
        Schema::create('student', function (Blueprint $table) {
            $table->id();
            $table->string('student_number')->unique();
            $table->enum('gender', ['MALE','FEMALE']);
            $table->date('birth_date');
            $table->year('batch_year');
            $table->boolean('is_active')->default(true);
            $table->enum('status',['DROPOUT','ACTIVE','SWITCH'])->default('ACTIVE');
            // relations
            $table->foreignId('teacher_id')
                ->nullable()
                ->constrained('teacher')
                ->nullOnDelete();

            $table->foreignId('class_id')
                ->nullable()
                ->constrained('classes')
                ->nullOnDelete();

            $table->foreignId('major_id')
                ->nullable()
                ->constrained('major')
                ->nullOnDelete();
            
            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student');
    }
};
