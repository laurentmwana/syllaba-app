<?php

use App\Enums\GenderEnum;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email')->nullable()->unique();
            $table->string('phone')->unique();
            $table->enum('gender', array_map(fn (GenderEnum $enum) => $enum->value, GenderEnum::cases()))
            ->default(GenderEnum::MALE->value);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
