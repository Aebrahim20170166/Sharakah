<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('attachments', function (Blueprint $table) {
            $table->id(); // المعرّف — أساسي
            $table->string('attachable_type',191); // نوع الكيان — Polymorphic
            $table->unsignedBigInteger('attachable_id'); // معرّف الكيان — Polymorphic
            $table->string('file_path',191); // مسار الملف — التخزين
            $table->string('label',191)->nullable(); // تسمية — وصف
            $table->json('meta')->nullable(); // بيانات إضافية — تفاصيل
            $table->timestamps(); // أختام زمنية
        });
    }
    public function down(): void { Schema::dropIfExists('attachments'); }
};
