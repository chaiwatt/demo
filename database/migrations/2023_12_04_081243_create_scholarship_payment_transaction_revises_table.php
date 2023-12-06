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
        Schema::create('scholarship_payment_transaction_revises', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('scholarship_payment_transaction_id');
            $table->foreign('scholarship_payment_transaction_id')->constrained('scholarship_payment_transactions')->onDelete('cascade')->name('wsa_yb_sca_scholarship_category_id_fk');
            $table->string('message')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scholarship_payment_transaction_revises');
    }
};
