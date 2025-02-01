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
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->string('file');
            $table->float('price')->default(1);
            $table->text('description')->default("Pas de description pour ce document.");
            $table->timestamps();
        });

        Schema::create('document_level', function (Blueprint $table) {
            $table->foreignId('level_id')
                ->constrained()
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->foreignId('document_id')
                ->constrained()
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->primary(['level_id', 'document_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
