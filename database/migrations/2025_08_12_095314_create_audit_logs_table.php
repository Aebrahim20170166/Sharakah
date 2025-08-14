<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('audit_logs', function (Blueprint $table) {
            $table->id(); // المعرّف — أساسي
            $table->unsignedBigInteger('user_id'); // منفّذ الإجراء — قد تكون أتمتة
            $table->string('action',191); // الإجراء — نوع العملية
            $table->string('entity_type',191); // نوع الكيان — اسم الجدول
            $table->unsignedBigInteger('entity_id'); // معرّف الكيان — المفتاح
            $table->json('before')->nullable(); // قبل — القيم السابقة
            $table->json('after')->nullable(); // بعد — القيم اللاحقة
            $table->string('ip',191); // عنوان IP — أمان
            $table->string('ua',191); // وكيل المستخدم — المتصفح/العميل
            $table->timestamp('created_at')->useCurrent(); // وقت الحدث — ختم زمني
        });
    }
    public function down(): void { Schema::dropIfExists('audit_logs'); }
};
