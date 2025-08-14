<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('distribution_items', function (Blueprint $table) {
            $table->id(); // المعرّف — أساسي
            $table->unsignedBigInteger('distribution_id'); // التوزيع — ربط
            $table->unsignedBigInteger('investment_id'); // الاستثمار — صاحب الحصة
            $table->unsignedBigInteger('user_id'); // المستثمر — للتسهيل
            $table->unsignedBigInteger('amount'); // المبلغ — نصيب المستثمر
            $table->timestamps(); // أختام زمنية
        });
    }
    public function down(): void { Schema::dropIfExists('distribution_items'); }
};
