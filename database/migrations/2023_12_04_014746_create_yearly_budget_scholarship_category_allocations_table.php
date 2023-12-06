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
        Schema::create('yearly_budget_scholarship_category_allocations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('yearly_budget_id');
            $table->unsignedBigInteger('scholarship_category_id');
            $table->foreign('yearly_budget_id')->constrained('yearly_budgets')->onDelete('cascade')->name('wsa_yb_sca_yearly_budget_id_fk');
            $table->foreign('scholarship_category_id')->constrained('scholarship_categories')->onDelete('cascade')->name('wsa_yb_sca_scholarship_category_id_fk');
            $table->double('cost',15,2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('yearly_budget_scholarship_category_allocations');
    }
};
