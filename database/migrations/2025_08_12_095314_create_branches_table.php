<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('branches', function (Blueprint $table) {
            $table->id(); // المعرّف — أساسي
            $table->unsignedBigInteger('opportunity_id'); // الفرصة — ربط بالفرصة
            $table->string('name',191); // UNIQUE // اسم الفرع — التسمية
            $table->string('city',191); // المدينة — موقع
            $table->date('go_live_date')->nullable(); // تاريخ التشغيل — بداية النشاط
            $table->unsignedBigInteger('capex_total'); // تكلفة التأسيس — أصول وتجهيزات
            $table->timestamps(); // أختام زمنية
            $table->softDeletes(); // حذف منطقي
        });
    }
    public function down(): void { Schema::dropIfExists('branches'); }
};
