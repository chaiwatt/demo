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
        Schema::create('scholarship_payment_durations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('scholarship_category_id');
            $table->foreign('scholarship_category_id')->constrained('scholarship_categories')->onDelete('cascade')->name('wsa_yb_sca_scholarship_category_id_fk');
            $table->unsignedBigInteger('month_id');
            $table->char('from_date',3)->default(10);
            $table->char('to_date',3)->default(20);
            $table->char('status',1)->default(1);
            $table->char('frequency',2)->default(2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scholarship_payment_durations');
    }
};
