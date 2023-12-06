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
        Schema::create('scholarship_category_education_floors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('scholarship_category_id');
            $table->foreign('scholarship_category_id')
                ->references('id')
                ->on('scholarship_categories')
                ->onDelete('cascade')
                ->name('wsa_yb_sca_scholarship_category_id_fk'); // กำหนดชื่อที่สั้นลง

            $table->unsignedBigInteger('education_floor_id');
            $table->foreign('education_floor_id')
                ->references('id')
                ->on('education_floors')
                ->onDelete('cascade')
                ->name('wsa_yb_sca_education_floor_id_fk'); // กำหนดชื่อที่สั้นลง

            $table->double('cost', 15, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scholarship_category_education_floors');
    }
};
