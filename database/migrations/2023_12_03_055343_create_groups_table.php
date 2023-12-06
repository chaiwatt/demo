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
        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable()->comment('โค้ด');
            $table->string('name')->comment('ชื่อกลุ่มทำงาน');
            $table->string('description')->nullable()->comment('คำอธิบายกลุ่มทำงาน');
            $table->string('icon')->nullable()->comment('ไอคอนกลุ่มทำงาน');
            $table->string('dashboard')->nullable()->comment('แดชบอร์ด');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('groups');
    }
};
