<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('complaint_statuses', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Complaint::class)->constrained()->cascadeOnDelete();
            $table->enum('status', ['pending', 'rejected', 'completed', 'onProcess'])->default('pending');
            $table->foreignIdFor(\App\Models\User::class, 'assigned_by')->nullable()->constrained('users','id')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('complaint_statuses');
    }
};
