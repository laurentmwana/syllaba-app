<?php

use App\Enums\EventTypeEnum;
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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->datetime('start_at')->default(now()->addMonths(2));
            $table->string('image')->nullable();
            $table->text('description');
            $table->enum('type', array_map(fn(EventTypeEnum $enum) => $enum->value, EventTypeEnum::cases()))
                ->default(EventTypeEnum::TRAINING->value);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
