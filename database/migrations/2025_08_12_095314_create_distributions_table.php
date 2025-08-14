<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('distributions', function (Blueprint $table) {
            $table->id(); // المعرّف — أساسي
            $table->unsignedBigInteger('opportunity_id'); // الفرصة — مصدر التوزيع
            $table->date('distribution_date'); // تاريخ التوزيع — دورية
            $table->unsignedBigInteger('total_amount'); // إجمالي المبلغ — بالهللة
            $table->json('meta')->nullable(); // تفاصيل — ملاحظات
            $table->timestamps(); // أختام زمنية
        });
    }
    public function down(): void { Schema::dropIfExists('distributions'); }
};
