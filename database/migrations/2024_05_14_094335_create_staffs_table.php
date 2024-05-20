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
        Schema::create('staffs', function (Blueprint $table) {
            $table->id();
            $table->json('attendance');
            $table->string('loffice');
            $table->string('outstation');
            $table->string('work_completed');
            $table->text('work_completed_remark')->nullable();
            $table->string('work_pending');
            $table->text('work_pending_remark')->nullable();
            $table->string('expense1')->nullable();
            $table->string('expense2')->nullable();
            $table->string('expense3')->nullable();
            $table->string('expense4')->nullable();
            $table->string('expense5')->nullable();
            $table->string('bikeExpense')->nullable();
            $table->integer('approved_expense')->default(4500);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staffs');
    }
};
