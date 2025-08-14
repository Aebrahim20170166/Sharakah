<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('documents', function (Blueprint $table) {
            $table->id(); // المعرّف — أساسي
            $table->unsignedBigInteger('opportunity_id'); // الفرصة — ربط اختياري
            $table->unsignedBigInteger('branch_id'); // الفرع — ربط اختياري
            $table->string('title',191); // العنوان — اسم الوثيقة
            $table->string('file_path',191); // مسار الملف — التخزين
            $table->enum('visibility',['public', 'investors', 'admin']); // مستوى الوصول — صلاحيات
            $table->unsignedInteger('version'); // الإصدار — رقم الإصدار
            $table->unsignedBigInteger('uploaded_by'); // رفع بواسطة — المستخدم الرافع
            $table->char('sha256',36); // بصمة الملف — للتحقق
            $table->json('tags')->nullable(); // وسوم — تصنيف
            $table->timestamps(); // أختام زمنية
        });
    }
    public function down(): void { Schema::dropIfExists('documents'); }
};
