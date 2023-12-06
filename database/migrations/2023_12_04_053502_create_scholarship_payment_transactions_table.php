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
        Schema::create('scholarship_payment_transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('yearly_budget_id');
            $table->foreign('yearly_budget_id')->references('id')->on('yearly_budgets')->onDelete('cascade');
            $table->unsignedBigInteger('scholarship_category_id');
            $table->foreign('scholarship_category_id')->references('id')->on('scholarship_categories')->onDelete('cascade');
            $table->unsignedBigInteger('month_id');
            $table->double('cost',15,2)->comment('ขอเบิกจ่าย');
            $table->double('payment_cost',15,2)->comment('เบิกจ่ายจริง');
            $table->char('status',1)->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scholarship_payment_transactions');
    }
};
