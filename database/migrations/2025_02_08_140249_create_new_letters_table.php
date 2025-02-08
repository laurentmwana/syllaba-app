<?php

use App\Enums\NewLetterStateEnum;
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
        Schema::create('new_letters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->enum('status', array_map(fn(NewLetterStateEnum $enum) => $enum->value, NewLetterStateEnum::cases()))
                ->default(NewLetterStateEnum::SUBSCRIBE->value);
            $table->datetime('unsubscribe_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('new_letters');
    }
};
