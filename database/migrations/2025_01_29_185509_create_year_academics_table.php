<?php

use App\Enums\YearAcademicEnum;
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
        Schema::create('year_academics', function (Blueprint $table) {
            $table->id();
            $table->integer('start');
            $table->integer('end');
            $table->enum('status', array_map(fn (YearAcademicEnum $enum) => $enum->value, YearAcademicEnum::cases()))
                ->default(YearAcademicEnum::OPEN->value);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('year_academics');
    }
};
