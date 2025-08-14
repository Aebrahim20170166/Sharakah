<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('opportunities', function (Blueprint $table) {
            $table->id(); // المعرّف — أساسي
            $table->unsignedBigInteger('tenant_id'); // الكيان — تعدّد
            $table->string('title',191); // عنوان الفرصة — اسم تسويقي
            $table->string('city',191); // المدينة — موقع التنفيذ
            $table->string('sector',191); // القطاع — مأكولات/صحة/خدمات
            $table->unsignedInteger('min_investment'); // الحد الأدنى للفرد — قيمة الدخول
            $table->enum('status',['open', 'filling', 'closed']); // الحالة — دورة التمويل
            $table->unsignedBigInteger('target_amount'); // إجمالي المطلوب — تكلفة التمويل
            $table->unsignedBigInteger('raised_amount'); // المجمّع حتى الآن — تقدّم الجمع
            $table->string('expected_roi'); // العائد المتوقع % — تقديري
            $table->string('payback_months'); // أشهر الاسترداد — تقديري
            $table->text('summary')->nullable(); // ملخّص — وصف سريع
            $table->json('assumptions')->nullable(); // افتراضات/مخاطر — شفافية
            $table->timestamps(); // أختام زمنية
            $table->softDeletes(); // حذف منطقي
        });
    }
    public function down(): void { Schema::dropIfExists('opportunities'); }
};
