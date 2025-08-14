<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('daily_reports', function (Blueprint $table) {
            $table->id(); // المعرّف — أساسي
            $table->unsignedBigInteger('branch_id'); // الفرع — الفرع المقصود
            $table->date('report_date'); // UNIQUE // تاريخ التقرير — اليوم المغطى
            $table->unsignedBigInteger('sales'); // مبيعات اليوم — بالهللة
            $table->unsignedBigInteger('expenses'); // مصروفات اليوم — بالهللة
            $table->unsignedBigInteger('net'); // صافي اليوم — مبيعات - مصروفات
            $table->json('meta')->nullable(); // تفاصيل إضافية — ملاحظات
            $table->timestamps(); // أختام زمنية
        });
    }
    public function down(): void { Schema::dropIfExists('daily_reports'); }
};
