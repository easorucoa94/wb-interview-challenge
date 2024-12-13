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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('employer_id')
                ->constrained(table: 'employers', indexName: 'jobs_employer_id')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('title', length: 100);
            $table->string('description', length: 1000);
            $table->date('start_date');
            $table->decimal('pay', total: 10, places: 2);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
