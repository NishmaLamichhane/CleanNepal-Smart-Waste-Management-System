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
        Schema::create('pickup_requests', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('contact');
            $table->string('address');
            $table->string('waste_type'); // e.g., plastic, paper, organic, recyclable
            $table->integer('quantity'); // in kg
            $table->dateTime('pickup_time');
            $table->enum('status', [
                'pending',
                'approved',
                'assigned',
                'in_progress',
                'completed',
                'cancelled'
            ])->default('pending');

            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('collector_id')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pickup_requests');
    }
};
