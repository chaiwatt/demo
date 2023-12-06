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
        Schema::create('scholarship_payment_transaction_attachments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('scholarship_payment_transaction_id');
            $table->foreign('scholarship_payment_transaction_id')
                ->references('id')
                ->on('scholarship_payment_transactions')
                ->onDelete('cascade')
                ->name('wsa_yb_sca_foreign'); // กำหนดชื่อที่สั้นลง
                
            $table->unsignedBigInteger('scholarship_attachment_id');
            $table->foreign('scholarship_attachment_id')
                ->references('id')
                ->on('scholarship_attachments')
                ->onDelete('cascade')
                ->name('wsa_yb_sca_attachment_foreign'); // กำหนดชื่อที่สั้นลง

            $table->string('file')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scholarship_payment_transaction_attachments');
    }
};
