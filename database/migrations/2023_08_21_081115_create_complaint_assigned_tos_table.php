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
        Schema::create('complaint_assigned_tos', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\ComplaintStatus::class)->constrained();
            $table->foreignIdFor(\App\Models\User::class, 'driver')->constrained('users','id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('complaint_assigned_tos');
    }
};
