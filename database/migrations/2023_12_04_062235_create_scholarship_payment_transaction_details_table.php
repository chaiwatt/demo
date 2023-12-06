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
        Schema::create('scholarship_payment_transaction_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('scholarship_payment_transaction_id');
            $table->foreign('scholarship_payment_transaction_id')
                ->references('id')
                ->on('scholarship_payment_transactions')
                ->onDelete('cascade')
                ->name('wsa_yb_sca_foreign'); // กำหนดชื่อที่สั้นลง
            $table->string('description')->nullable();
            $table->string('tracking_number')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scholarship_payment_transaction_details');
    }
};
